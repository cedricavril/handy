/**
 * External dependencies
 */
import { useLocation } from 'react-router-dom';

/**
 * WordPress dependencies
 */
import {
	Button,
	Card,
	CardFooter,
	CardBody,
	ClipboardButton,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { FlexSpacer } from '@ithemes/security-components';
import { Crash as Icon } from '@ithemes/security-style-guide';
import './style.scss';

export default function ErrorRenderer( { error } ) {
	const { pathname } = useLocation();

	return (
		<Card className="itsec-error-renderer">
			<CardBody>
				<Icon />
			</CardBody>
			<CardFooter isShady>
				{ __( 'An unexpected error occurred.', 'better-wp-security' ) }
				<FlexSpacer />
				<Button isSecondary onClick={ () => window.location.reload() }>
					{ __( 'Refresh', 'better-wp-security' ) }
				</Button>
				<ClipboardButton
					isPrimary
					text={ `Page: ${ pathname }\nError: ${ error.stack }` }
				>
					{ __( 'Copy Error', 'better-wp-security' ) }
				</ClipboardButton>
			</CardFooter>
		</Card>
	);
}
