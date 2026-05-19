<?php
    namespace Framework;

    use Framework\Session;

    class Authorization {
        /**
         * Check if logged in user owns a listing
         * @param int $resourceId
         * @return bool
         */
        public static function isOwner($resourceId) {
            $sessionUser = Session::get('user');

            if ($sessionUser !== null && isset($sessionUser['id'])) {
                return (int)$sessionUser['id'] === (int)$resourceId;
            }

            return false;
        }
    }
?>