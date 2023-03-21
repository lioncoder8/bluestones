var aasta = {

	/**
	 * An object containing definitions for controls.
	 */
	control: {

		/**
		 * The color control.
		 */
		'aasta-color': {

			/**
			 * Init the control.
			 *
			 * @param {object} [control] The customizer control object.
			 * @returns {void}
			 */
			init: function ( control ) {
				var self = this;

				// Render the template.
				self.template( control );

				// Init the control.
				aasta.input.color.init( control );
			},

			/**
			 * Render the template.
			 *
			 * @param {object} [control] The customizer control object.
			 * @returns {void}
			 */
			template: function ( control ) {
				control.container.html(
					aasta.input.color.getTemplate( {
						label: control.params.label,
						description: control.params.description,
						'data-id': control.id,
						mode: control.params.mode,
						inputAttrs: control.params.inputAttrs,
						'data-palette': control.params.palette,
						'data-default-color': control.params.default,
						'data-alpha': control.params.choices.alpha,
						value: control.setting._value
					} )
				);
			}
		}
	},

	/**
	 * An object containing definitions for input fields.
	 */
	input: {

		/**
		 * Color input fields.
		 */
		color: {

			/**
			 * Get the HTML for color inputs.
			 *
			 * @param {object} [data] The arguments.
			 * @returns {string}
			 */
			getTemplate: function ( data ) {
				var html = '';

				data = _.defaults( data, {
					label: '',
					description: '',
					mode: 'full',
					inputAttrs: '',
					'data-palette': data['data-palette'] ? data['data-palette'] : true,
					'data-default-color': data['data-default-color'] ?
						data['data-default-color'] :
						'',
					'data-alpha': data['data-alpha'] ? data['data-alpha'] : false,
					value: '',
					'data-id': ''
				} );

				html += '<label>';
				if ( data.label ) {
					html +=
						'<span class="customize-control-title">' + data.label + '</span>';
				}
				if ( data.description ) {
					html +=
						'<span class="description customize-control-description">' +
						data.description +
						'</span>';
				}
				html += '</label>';
				html +=
					'<input type="text" data-type="' +
					data.mode +
					'" ' +
					data.inputAttrs +
					' data-palette="' +
					data['data-palette'] +
					'" data-default-color="' +
					data['data-default-color'] +
					'" data-alpha="' +
					data['data-alpha'] +
					'" value="' +
					data.value +
					'" class="aasta-color-control" data-id="' +
					data['data-id'] +
					'"/>';

				return (
					'<div class="aasta-input-container" data-id="' +
					data.id +
					'">' +
					html +
					'</div>'
				);
			},

			/**
			 * Init the control.
			 *
			 * @param {object} [control] The control object.
			 * @returns {void}
			 */
			init: function ( control ) {
				var picker = jQuery(
					'.aasta-color-control[data-id="' + control.id + '"]'
				    ),
				    clear;

				control.choices = control.choices || {};
				if ( _.isEmpty( control.choices ) && control.params.choices ) {
					control.choices = control.params.choices;
				}

				// If we have defined any extra choices, make sure they are passed-on to Iris.
				if ( !_.isEmpty( control.choices ) ) {
					picker.wpColorPicker( control.choices );
				}

				// Tweaks to make the "clear" buttons work.
				setTimeout( function () {
					clear = jQuery(
						'.aasta-input-container[data-id="' +
						control.id +
						'"] .wp-picker-clear'
					);
					if ( clear.length ) {
						clear.click( function () {
							control.setting.set( '' );
						} );
					}
				}, 200 );

				// Saves our settings to the WP API
				picker.wpColorPicker( {
					change: function () {

						// Small hack: the picker needs a small delay
						setTimeout( function () {
							control.setting.set( picker.val() );
						}, 20 );
					}
				} );
			}
		}
	},

	/**
	 * An object containing definitions for settings.
	 */
	setting: {

		/**
		 * Gets the value of a setting.
		 *
		 * This is a helper function that allows us to get the value of
		 * control[key1][key2] for example, when the setting used in the
		 * customizer API is "control".
		 *
		 * @param {string} [setting] The setting for which we're getting the value.
		 * @returns {mixed} Depends on the value.
		 */
		get: function ( setting ) {
			var parts        = setting.split( '[' ),
			    foundSetting = '',
			    foundInStep  = 0,
			    currentVal   = '';

			_.each( parts, function ( part, i ) {
				part = part.replace( ']', '' );

				if ( 0 === i ) {
					foundSetting = part;
				} else {
					foundSetting += '[' + part + ']';
				}

				if ( !_.isUndefined( wp.customize.instance( foundSetting ) ) ) {
					currentVal  = wp.customize.instance( foundSetting ).get();
					foundInStep = i;
				}

				if ( foundInStep < i ) {
					if ( _.isObject( currentVal ) && !_.isUndefined( currentVal[part] ) ) {
						currentVal = currentVal[part];
					}
				}
			} );

			return currentVal;
		},

		/**
		 * Sets the value of a setting.
		 *
		 * This function is a bit complicated because there any many scenarios to consider.
		 * Example: We want to save the value for my_setting[something][3][something-else].
		 * The control's setting is my_setting[something].
		 * So we need to find that first, then figure out the remaining parts,
		 * merge the values recursively to avoid destroying my_setting[something][2]
		 * and also take into account any defined "key" arguments which take this even deeper.
		 *
		 * @param {object|string} [element] The DOM element whose value has changed,
		 *                                  or an ID.
		 * @param {mixed}         [value]   Depends on the control-type.
		 * @param {string}        [key]     If we only want to save an item in an object
		 *                                  we can define the key here.
		 * @returns {void}
		 */
		set: function ( element, value, key ) {
			var setting,
			    parts,
			    currentNode   = '',
			    foundNode     = '',
			    subSettingObj = {},
			    currentVal,
			    subSetting,
			    subSettingParts;

			// Get the setting from the element.
			setting = element;
			if ( _.isObject( element ) ) {
				if ( jQuery( element ).attr( 'data-id' ) ) {
					setting = element.attr( 'data-id' );
				} else {
					setting = element.parents( '[data-id]' ).attr( 'data-id' );
				}
			}

			(
				parts = setting.split( '[' )
			),

				// Find the setting we're using in the control using the customizer API.
				_.each( parts, function ( part, i ) {
					part = part.replace( ']', '' );

					// The current part of the setting.
					currentNode = 0 === i ? part : '[' + part + ']';

					// When we find the node, get the value from it.
					// In case of an object we'll need to merge with current values.
					if ( !_.isUndefined( wp.customize.instance( currentNode ) ) ) {
						foundNode  = currentNode;
						currentVal = wp.customize.instance( foundNode ).get();
					}
				} );

			// Get the remaining part of the setting that was unused.
			subSetting = setting.replace( foundNode, '' );

			// If subSetting is not empty, then we're dealing with an object
			// and we need to dig deeper and recursively merge the values.
			if ( '' !== subSetting ) {
				if ( !_.isObject( currentVal ) ) {
					currentVal = {};
				}
				if ( '[' === subSetting.charAt( 0 ) ) {
					subSetting = subSetting.replace( '[', '' );
				}
				subSettingParts = subSetting.split( '[' );
				_.each( subSettingParts, function ( subSettingPart, i ) {
					subSettingParts[i] = subSettingPart.replace( ']', '' );
				} );

				// If using a key, we need to go 1 level deeper.
				if ( key ) {
					subSettingParts.push( key );
				}

				// Converting to a JSON string and then parsing that to an object
				// may seem a bit hacky and crude but it's efficient and works.
				subSettingObj =
					'{"' +
					subSettingParts.join( '":{"' ) +
					'":"' +
					value +
					'"' +
					'}'.repeat( subSettingParts.length );
				subSettingObj = JSON.parse( subSettingObj );

				// Recursively merge with current value.
				jQuery.extend( true, currentVal, subSettingObj );
				value = currentVal;
			} else {
				if ( key ) {
					currentVal      = !_.isObject( currentVal ) ? {} : currentVal;
					currentVal[key] = value;
					value           = currentVal;
				}
			}
			wp.customize.control( foundNode ).setting.set( value );
		}
	}
};

(
	function () {
		'use strict';

		/**
		 * A dynamic color-alpha control.
		 *
		 * @class
		 * @augments wp.customize.Control
		 * @augments wp.customize.Class
		 */
		wp.customize.aastaDynamicControl = wp.customize.Control.extend( {
			initialize: function ( id, options ) {
				var control = this,
				    args    = options || {};

				args.params = args.params || {};
				if ( !args.params.type ) {
					args.params.type = 'aasta-generic';
				}
				if ( !args.params.content ) {
					args.params.content = jQuery( '<li></li>' );
					args.params.content.attr(
						'id',
						'customize-control-' + id.replace( /]/g, '' ).replace( /\[/g, '-' )
					);
					args.params.content.attr(
						'class',
						'customize-control customize-control-' + args.params.type
					);
				}

				control.propertyElements = [];
				wp.customize.Control.prototype.initialize.call( control, id, args );
			},

			/**
			 * Add bidirectional data binding links between inputs and the setting(s).
			 *
			 * This is copied from wp.customize.Control.prototype.initialize(). It
			 * should be changed in Core to be applied once the control is embedded.
			 *
			 * @private
			 * @returns {void}
			 */
			_setUpSettingRootLinks: function () {
				var control = this,
				    nodes   = control.container.find( '[data-customize-setting-link]' );

				nodes.each( function () {
					var node = jQuery( this );

					wp.customize( node.data( 'customizeSettingLink' ), function ( setting ) {
						var element = new wp.customize.Element( node );
						control.elements.push( element );
						element.sync( setting );
						element.set( setting() );
					} );
				} );
			},

			/**
			 * Add bidirectional data binding links between inputs and the setting properties.
			 *
			 * @private
			 * @returns {void}
			 */
			_setUpSettingPropertyLinks: function () {
				var control = this,
				    nodes;

				if ( !control.setting ) {
					return;
				}

				nodes = control.container.find( '[data-customize-setting-property-link]' );

				nodes.each( function () {
					var node         = jQuery( this ),
					    element,
					    propertyName = node.data( 'customizeSettingPropertyLink' );

					element = new wp.customize.Element( node );
					control.propertyElements.push( element );
					element.set( control.setting()[propertyName] );

					element.bind( function ( newPropertyValue ) {
						var newSetting = control.setting();
						if ( newPropertyValue === newSetting[propertyName] ) {
							return;
						}
						newSetting               = _.clone( newSetting );
						newSetting[propertyName] = newPropertyValue;
						control.setting.set( newSetting );
					} );
					control.setting.bind( function ( newValue ) {
						if ( newValue[propertyName] !== element.get() ) {
							element.set( newValue[propertyName] );
						}
					} );
				} );
			},

			/**
			 * @inheritdoc
			 */
			ready: function () {
				var control = this;

				control._setUpSettingRootLinks();
				control._setUpSettingPropertyLinks();

				wp.customize.Control.prototype.ready.call( control );

				control.deferred.embedded.done( function () {
					control.initAastaControl( control );
				} );
			},

			/**
			 * Embed the control in the document.
			 *
			 * Override the embed() method to do nothing,
			 * so that the control isn't embedded on load,
			 * unless the containing section is already expanded.
			 *
			 * @returns {void}
			 */
			embed: function () {
				var control   = this,
				    sectionId = control.section();

				if ( !sectionId ) {
					return;
				}

				wp.customize.section( sectionId, function ( section ) {
					if (
						'aasta-expanded' === section.params.type ||
						section.expanded() ||
						wp.customize.settings.autofocus.control === control.id
					) {
						control.actuallyEmbed();
					} else {
						section.expanded.bind( function ( expanded ) {
							if ( expanded ) {
								control.actuallyEmbed();
							}
						} );
					}
				} );
			},

			/**
			 * Deferred embedding of control when actually
			 *
			 * This function is called in Section.onChangeExpanded() so the control
			 * will only get embedded when the Section is first expanded.
			 *
			 * @returns {void}
			 */
			actuallyEmbed: function () {
				var control = this;
				if ( 'resolved' === control.deferred.embedded.state() ) {
					return;
				}
				control.renderContent();
				control.deferred.embedded.resolve(); // This triggers control.ready().
			},

			/**
			 * This is not working with autofocus.
			 *
			 * @param {object} [args] Args.
			 * @returns {void}
			 */
			focus: function ( args ) {
				var control = this;
				control.actuallyEmbed();
				wp.customize.Control.prototype.focus.call( control, args );
			},

			/**
			 * Additional actions that run on ready.
			 *
			 * @param {object} [args] Args.
			 * @returns {void}
			 */
			initAastaControl: function ( control ) {
				if ( 'undefined' !== typeof aasta.control[control.params.type] ) {
					aasta.control[control.params.type].init( control );
					return;
				}

				// Save the value
				this.container.on( 'change keyup paste click', 'input', function () {
					control.setting.set( jQuery( this ).val() );
				} );
			},

			aastaValidateCSSValue: function ( value ) {
				var validUnits = [
					    'rem',
					    'em',
					    'ex',
					    '%',
					    'px',
					    'cm',
					    'mm',
					    'pt'
				    ],
				    numericValue,
				    unit;

				// 0 is always a valid value, and we can't check calc() values effectively.
				if (
					'0' === value ||
					(
						0 <= value.indexOf( 'calc(' ) && 0 <= value.indexOf( ')' )
					)
				) {
					return true;
				}

				// Get the numeric value.
				numericValue = parseFloat( value );

				// Get the unit
				unit = value.replace( numericValue, '' );

				// Check the validity of the numeric value and units.
				if ( isNaN( numericValue ) || -1 === jQuery.inArray( unit, validUnits ) ) {
					return false;
				}
				return true;
			}
		} );
	}()
);

_.each( aasta.control, function ( obj, type ) {
	wp.customize.controlConstructor[
		type
		] = wp.customize.aastaDynamicControl.extend( {} );
} );

/**
 * Control: Slider.
 */
wp.customize.controlConstructor['aasta-slider'] = wp.customize.Control.extend( {

	// When we're finished loading continue processing
	ready: function () {
		'use strict';

		var control      = this,
		    changeAction = (
			    'postMessage' === control.setting.transport
		    ) ? 'mousemove change' : 'change',
		    slider       = control.container.find( '.aasta-slider' ),
		    input        = control.container.find( 'input.slider-input' ),
		    min          = Number( input.attr( 'min' ) ),
		    max          = Number( input.attr( 'max' ) ),
		    step         = Number( input.attr( 'step' ) ),
		    $this,
		    val;

		slider.slider( {
			range: 'min',
			min: min,
			max: max,
			value: input.val(),
			step: step,
			slide: function ( event, ui ) {
				// Trigger keyup in input.
				input.val( ui.value ).keyup();
			},
			change: function ( event, ui ) {

				// Save the values.
				control.initAastaControl();
			}
		} );

		input.on( 'change keyup paste', function () {
			$this = jQuery( this );
			val   = $this.val();

			slider.slider( 'value', val );
		} );

		// Change on input.
		control.container.on(
			'change keyup paste',
			'.customize-control-content input.slider-input',
			function () {
				control.setting.set( jQuery( this ).val() );
			}
		);

		// Reset.
		control.container.find( '.slider-reset' ).on( 'click', function () {
			input.attr( 'value', control.params.default.slider );
			slider.slider( 'value', control.params.default.slider );
			control.setting.set( input.val() );
		} );

		// Init the control.
		if ( !_.isUndefined( window.aastaControlLoader ) && _.isFunction( aastaControlLoader ) ) {
			aastaControlLoader( control );
		} else {
			control.initAastaControl();
		}
	},

	initAastaControl: function () {

		var control     = this,
		    subControls = control.params.choices.controls,
		    value       = {},
		    subsArray   = [],
		    i;

		_.each( subControls, function ( v, i ) {
			if ( true === v ) {
				subsArray.push( i );
			}
		} );

		for ( i = 0; i < subsArray.length; i++ ) {
			value[subsArray[i]] = control.setting._value[subsArray[i]];
			control.updateSliderValue( subsArray[i], value );
		}

	},

	/**
	 * Updates the value.
	 */
	updateSliderValue: function ( context, value ) {

		var control = this;

		control.container.on( 'change keyup paste', 'input.slider-input', function () {
			value['slider'] = jQuery( this ).val();
			value['suffix'] = jQuery( this ).next().val();

			// Save the value
			control.saveValue( value );
		} );

		// TODO: find a way to merge event.
		control.container.on( 'click', '.slider-reset', function () {
			value['slider'] = jQuery( this ).siblings('.slider-input').val();
			value['suffix'] = jQuery( this ).prev().val();

			// Save the value
			control.saveValue( value );
		} );
	},

	/**
	 * Saves the value.
	 */
	saveValue: function ( value ) {
		var control  = this,
		    newValue = {};
		_.each( value, function ( newSubValue, i ) {
			newValue[i] = newSubValue;
		} );

		control.setting.set( newValue );
	}
} );


/**
 * Control: Sortable.
 */
/* global aastaControlLoader */
wp.customize.controlConstructor['aasta-sortable'] = wp.customize.Control.extend( {

	// When we're finished loading continue processing
	ready: function () {
		'use strict';

		var control = this;

		// Init the control.
		if (
			!_.isUndefined( window.aastaControlLoader ) &&
			_.isFunction( aastaControlLoader )
		) {
			aastaControlLoader( control );
		} else {
			control.initAastaControl();
		}
	},

	initAastaControl: function () {
		'use strict';

		var control = this;
		control.container.find( '.aasta-controls-loading-spinner' ).hide();

		// Set the sortable container.
		control.sortableContainer = control.container.find( 'ul.sortable' ).first();

		// Init sortable.
		control.sortableContainer
		       .sortable( {

			       // Update value when we stop sorting.
			       stop: function () {
				       control.updateValue();
			       }
		       } )
		       .disableSelection()
		       .find( 'li' )
		       .each( function () {

			       // Enable/disable options when we click on the eye of Thundera.
			       jQuery( this )
				       .find( 'i.visibility' )
				       .click( function () {
					       jQuery( this )
						       .toggleClass( 'dashicons-visibility-faint' )
						       .parents( 'li:eq(0)' )
						       .toggleClass( 'invisible' );
				       } );
		       } )
		       .click( function () {

			       // Update value on click.
			       control.updateValue();
		       } );
	},

	/**
	 * Updates the sorting list
	 */
	updateValue: function () {
		'use strict';

		var control  = this,
		    newValue = [];

		this.sortableContainer.find( 'li' ).each( function () {
			if ( !jQuery( this ).is( '.invisible' ) ) {
				newValue.push( jQuery( this ).data( 'value' ) );
			}
		} );
		control.setting.set( newValue );
	}
} );

/**
 * Control: Radio image.
 */
wp.customize.controlConstructor['aasta-radio-image'] = wp.customize.aastaDynamicControl.extend( {} );

/**
 * Control: Toggle.
 */
wp.customize.controlConstructor['aasta-toggle'] = wp.customize.aastaDynamicControl.extend( {

	// When we're finished loading continue processing
	ready: function () {
		'use strict';

		var control = this;

		// Init the control.
		if (
			!_.isUndefined( window.aastaControlLoader ) &&
			_.isFunction( aastaControlLoader )
		) {
			aastaControlLoader( control );
		} else {
			control.initAastaControl();
		}
	},

	initAastaControl: function () {
		var control       = this,
		    checkboxValue = control.setting._value;

		// Save the value
		this.container.on( 'change', 'input', function () {
			checkboxValue = jQuery( this ).is( ':checked' ) ? true : false;
			control.setting.set( checkboxValue );
		} );
	}
} );

/**
 * Control: Radio Buttonset.
 */
wp.customize.controlConstructor['aasta-radio-buttonset'] = wp.customize.Control.extend( {} );