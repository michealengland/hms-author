( function( blocks, components, i18n, element, _ ) {
  var el = wp.element.createElement;

  blocks.registerBlockType( 'hms-block-1/hms-editabe-block', {
    title: 'HMS Content & Image',
    icon: 'index-card',
    category: 'layout',
    attributes: {

      // Title
      title: {
        type: 'array',
        source: 'children',
        selector: 'h2',
      },

      // Content
      content: {
        type: 'array',
        source: 'children',
        selector: 'p',
      },

      // Row Image
      mediaID: {
        type: 'number',
      },

      mediaURL: {
        type: 'string',
        source: 'attribute',
        selector: 'img',
        attribute: 'src',
      },
    },

    edit: function( props ) {
      var attributes = props.attributes; // Needed for IMG Upload

        //var content = props.attributes.content;
        var onSelectImage = function( media ) {
          return props.setAttributes( {
            mediaURL: media.url,
            mediaID: media.id,
          } );
        };

        return (

          el( 'div', { className: props.className },

              // Block Content
    					el( wp.blocks.RichText, {
    						tagName: 'h2',
                inline: false,
    						className: 'title',
    						placeholder: i18n.__( 'Your Block Title' ),
    						value: props.attributes.title,
    						onChange: function  onChangeContent( newTitle ) {
  								props.setAttributes( { title: newTitle } );
    						},
    					} ),


              // Editable Content Field
              el( wp.blocks.RichText, {
                tagName: 'p',
                className: 'content',
                placeholder: i18n.__( 'Write some content…' ),
                keepPlaceholderOnFocus: true,
                formattingControls: [ 'bold', 'italic', 'link' ],
                value: props.attributes.content,

                onChange: function onChangeContent( newContent ) {
                  props.setAttributes( { content: newContent } );
                },

                isSelected: props.isSelected,
              } ),

              // Row Image
              el( 'div', { className: 'flex-image' },

                el( blocks.MediaUpload, {
                  onSelect: onSelectImage,
                  type: 'image',
                  value: attributes.mediaID,
                  render: function( obj ) {
                    return el( components.Button, {
                        className: attributes.mediaID ? 'image-button' : 'button button-large',
                        onClick: obj.open
                      },
                      ! attributes.mediaID ? i18n.__( 'Upload Image' ) : el( 'img', { src: attributes.mediaURL } )
                    );
                  }
                } )

              ), // .flex-image

          ) // .hms-flex

        ); // end return

    },

    save: function( props ) {

        var attributes = props.attributes;


      //  return el( 'p', { className: props.className }, content );
      return (
        el( 'div', { className: 'hms-flex-row front-page fadeInDown animationDelay animated' },
          // Content Container
          el( 'div', { className: 'row-content' },
            el( 'h2', { className: 'title' }, attributes.title ),
            el( 'p', { className: 'content' }, attributes.content ),
          ),

          attributes.mediaURL &&
            el( 'figure', { className: 'image-container' },
              el( 'img', { src: attributes.mediaURL } ),
              // NEEDS FIGURE CAPTION
            ),
        )
      );
    },

  } );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
	window._,
);
