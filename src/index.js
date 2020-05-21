import { registerBlockType } from '@wordpress/blocks';

registerBlockType( 'kb-admin-color-scheme/test-block', {
	title: 'Basic Example',
	icon: 'smiley',
	category: 'common',
	edit: () => <div>Hola, mundo!</div>,
	save: () => <div>Hola, mundo!</div>,
} );
