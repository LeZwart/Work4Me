<?php
    // 1.	Toevoegen van gebruikers (via een aparte pagina om te registreren)
    // 2.	Toevoegen van workouts (via een aparte pagina om workouts toe te voegen)
    // 3.	Bekijken van gebruikers (via een aparte overzichtspagina met gebruikers)
    // 4.	Bekijken van workouts (via een aparte overzichtspagina met workouts)
    // 5.	Bekijken van statistieken (onderdeel van de overzichtspagina’s bij 3 en 4)
    // 6.	Inloggen door gebruikers (via een aparte pagina om in te loggen)
    // 7.	Uitloggen door gebruikers (onderdeel van alle pagina’s)

    // enum('Administrator', 'Manager', 'Regular')
class Permission 
{
    public $ADMIN_PERMISSIONS = [1, 2, 3, 4, 5, 6, 7];
    public $MANAGER_PERMISSIONS = [1, 2, 4, 5, 6, 7];
    public $USER_PERMISSIONS = [1, 4, 6, 7];

        // Voorbeeld //
        // require "permission.php";
        // $permission = new Permission();
        // $result = $permission->checkPermission(4, "Administrator");
        // // // // //

    public function checkPermission($permission_id, $role) {
        switch ($role) {
            case "Administrator":
                return in_array($permission_id, $this->ADMIN_PERMISSIONS);
                break;

            case "Manager":
                return in_array($permission_id, $this->MANAGER_PERMISSIONS);
                break;

            case "Regular":
                return in_array($permission_id, $this->USER_PERMISSIONS);
                break;

            default:
                throw new Exception($role . " is not a valid role.");
        }
    }
}
?>