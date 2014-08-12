<?php
/**
 */

/**
 * Get the option with the specified key. If the option is not found, return the default value.
 *
 * @param string $key     The option key.
 * @param string $default The default value (default = null).
 * @return mixed The option value.
 */
function ioch_get_option( $key, $default = null ) {

    // Get the options, if none is set return the default value.
    if ( false === ( $options = get_option( IOCH_SETTINGS ) ) || ! isset( $options[$key] ) ) {
        return $default;
    };

    return $options[$key];

}

/**
 * Set the specified option.
 *
 * @param string $key   The option's key.
 * @param string $value The option's value.
 */
function ioch_set_option( $key, $value ) {

    // If the settings are not yet set, then add them.
    if ( false === ( $options = get_option( IOCH_SETTINGS ) ) ) {
        add_option( IOCH_SETTINGS, array( $key => $value ) );
    }

    // Update the settings.
    $options[$key] = $value;
    update_option( $options );

}