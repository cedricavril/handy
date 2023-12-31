/**
 * WordPress dependencies
 */
import { registerStore } from '@wordpress/data';

/**
 * Internal dependencies
 */
import controls from '../controls';
import * as actions from './actions';
import * as selectors from './selectors';
import * as resolvers from './resolvers';
import reducer from './reducers';

const STORE_NAME = 'ithemes-security/bans';

registerStore( STORE_NAME, {
	controls,
	actions,
	selectors,
	resolvers,
	reducer,
} );

export { STORE_NAME };
