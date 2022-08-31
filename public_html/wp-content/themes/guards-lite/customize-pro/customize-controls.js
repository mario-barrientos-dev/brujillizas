( function( api ) {

	// Extends our custom "guards-lite" section.
	api.sectionConstructor['guards-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );