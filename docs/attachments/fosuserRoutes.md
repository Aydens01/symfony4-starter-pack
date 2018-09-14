# FOSUserBundle Routes

Here, all the routes provide by FOSUserBundle :

    fos_user_security_login           ANY      ANY  /login
    fos_user_security_check           ANY      ANY  /login_check
    fos_user_security_logout          ANY      ANY  /logout
    fos_user_profile_show             GET      ANY  /profile/
    fos_user_profile_edit             ANY      ANY  /profile/edit
    fos_user_registration_register    ANY      ANY  /register/
    fos_user_registration_check_email GET      ANY  /register/check-email
    fos_user_registration_confirm     GET      ANY  /register/confirm/{token}
    fos_user_registration_confirmed   GET      ANY  /register/confirmed
    fos_user_resetting_request        GET      ANY  /resetting/request
    fos_user_resetting_send_email     POST     ANY  /resetting/send-email
    fos_user_resetting_check_email    GET      ANY  /resetting/check-email
    fos_user_resetting_reset          GET|POST ANY  /resetting/reset/{token}
    fos_user_change_password          GET|POST ANY  /profile/change-password