<?php
/**
 * This file contains logging functions.
 */

/**
 * Log messages by sending them to the handler defined via the *ioch_write_log_handler* filter, or the default
 * *ioch_write_log_handler* method.
 *
 * @uses ioch_write_log_handler as default log handler, to write to the debug log.
 *
 * @param string $log A log message.
 * @param array  $args An array of arguments to replace in the log message.
 */
function ioch_write_log( $log, $args = array() )
{
    $handler = apply_filters( 'ioch_write_log_handler', null );

    if ( is_null( $handler ) ) {
        return ioch_write_log_handler( $log, $args );
    }

    call_user_func( $handler, $log, $args );
}

/**
 * Log messages to the error log.
 *
 * @param string $log The log message.
 * @param array  $args An array of arguments to replace in the log message.
 */
function ioch_write_log_handler( $log, $args ) {

    if ( true === WP_DEBUG ) {
        if ( is_array( $log ) || is_object( $log ) ) {
            $message = print_r( $log, true );
        } else {

            // Print out the log message.
            $message = ioch_interpolate( $log, $args );
        }
    }

    // In case we're running inside tests, we echo messages, not error_log them (otherwise tests might fail.
    if ( defined( 'WP_TESTS_DOMAIN' ) ) {
        echo $message . "\n";
    } else {
        error_log( $message );
    }

}

/**
 * Interpolate the provided parameters in the string.
 *
 * @param string $string The message string.
 * @param string $args   The values to interpolate.
 * @return string The interpolated string.
 */
function ioch_interpolate( $string, $args ) {

    foreach ( $args as $key => $value ) {
        $string = str_replace( '{' . $key . '}', $value, $string );
    }

    return $string;

}