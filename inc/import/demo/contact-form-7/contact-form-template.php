<?php
/**
 * Template: Contact form 7 demo.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists('urestaurant_get_demo_form')) {
    /**
     * Contact from demo form.
     *
     * @since 1.0.0
     *
     * @return mixed|HTML
     */
    function urestaurant_get_demo_form() {
        $form = sprintf(
            ' <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						[text* your-name placeholder "%1$s"]
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						[text* your-email placeholder "%2$s"]
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						[text* your-phone placeholder "%3$s"]
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						[text your-address placeholder "%4$s"]
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
					[textarea* message id:message placeholder "%5$s"]
					</div>
				</div>
				<div class="col-md-12 text-center mt-2">
					[submit class:btn class:v4 "%6$s"]
				</div>
			<div>',
            __('Name', 'urestaurant'),
            __('Email', 'urestaurant'),
            __('Phone', 'urestaurant'),
            __('Address', 'urestaurant'),
            __('Message', 'urestaurant'),
            __('Submit', 'urestaurant') 
        );
        return trim($form);
    }
}

if (! function_exists('urestaurant_get_demo_mail')) {
    /**
     * Contact form 7 demo mail.
     *
     * @since 1.0.0
     *
     * @return array $mail The mail array.
     */
    function urestaurant_get_demo_mail() {
        $mail = array(
        'active'             => true,
        'subject'            =>
        sprintf(
        /* translators: 1: blog name */
            _x('%1$s', 'mail subject', 'urestaurant'),
            get_bloginfo('name')
        ),
        'sender'             => sprintf(
            '%s <%s>',
            get_bloginfo('name'),
            urestaurant_get_admin_from_email() 
        ),
        'body'               =>
        /* translators: %s: [your-name] <[your-email]> */
        sprintf(
            __('From: %s', 'urestaurant'),
            '[your-name] <[your-email]> [your-phone]> [your-address]>' 
        ) . "\n"
        . esc_html__('Message Body:', 'urestaurant')
                    . "\n" . '[message]' . "\n\n"
        . '-- ' . "\n"
        . sprintf(
                    /* translators: 1: blog name, 2: blog URL */
            __('This e-mail was sent from a contact form on %1$s (%2$s)', 'urestaurant'),
            get_bloginfo('name'),
            get_bloginfo('url')
        ),
        'recipient'          => get_option('admin_email'),
        'additional_headers' => '',
        'attachments'        => '',
        'use_html'           => 0,
        'exclude_blank'      => 0,
        );

        return $mail;
    }
}

if (! function_exists('urestaurant_get_demo_mail_2')) {
    /**
     * Contact form 7 demo mail 2.
     *
     * @since 1.0.0
     *
     * @return array $mail_2 The mail array.
     */
    function urestaurant_get_demo_mail_2() {
        $mail_2 = array(
        'active'             => false,
        'subject'            =>
        sprintf(
        /* translators: 1: blog name, 2: [your-subject] */
            _x('%1$s "%2$s"', 'mail subject', 'urestaurant'),
            get_bloginfo('name'),
            '[your-subject]'
        ),
        'sender'             => sprintf(
            '%s <%s>',
            get_bloginfo('name'),
            urestaurant_get_admin_from_email() 
        ),
        'body'               =>
        __('Message Body:', 'urestaurant')
                    . "\n" . '[message]' . "\n\n"
        . '-- ' . "\n"
        . sprintf(
                    /* translators: 1: blog name, 2: blog URL */
            __('This e-mail was sent from a contact form on %1$s (%2$s)', 'urestaurant'),
            get_bloginfo('name'),
            get_bloginfo('url')
        ),
        'recipient'          => '[your-email]',
        'additional_headers' => sprintf(
            'Reply-To: %s',
            get_option('admin_email') 
        ),
        'attachments'        => '',
        'use_html'           => 0,
        'exclude_blank'      => 0,
        );
        return $mail_2;
    }
}

if (! function_exists('urestaurant_get_admin_from_email')) {
    /**
     * Contact admin form sender email.
     *
     * @since 1.0.0
     *
     * @return string 
     */
    function urestaurant_get_admin_from_email() {
        $admin_email = get_option('admin_email');
        $sitename    = strtolower($_SERVER['SERVER_NAME']);

        if (function_exists('wpcf7_is_localhost') && wpcf7_is_localhost()) {
            return $admin_email;
        }

        if (substr($sitename, 0, 4) == 'www.' ) {
            $sitename = substr($sitename, 4);
        }

        if (strpbrk($admin_email, '@') == '@' . $sitename ) {
            return $admin_email;
        }

        return 'wordpress@' . $sitename;
    }
}

if (! function_exists('urestaurant_get_demo_messages')) {
    /**
     * Contact form demo messages.
     *
     * @since 1.0.0
     *
     * @return array $messages
     */
    function urestaurant_get_demo_messages() {
        $messages = array();

        if (function_exists('wpcf7_messages')) {
            foreach ( wpcf7_messages() as $key => $arr ) {
                $messages[ $key ] = $arr['default'];
            }
        }

        return $messages;
    }
}
