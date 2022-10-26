<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'visit' => [
        'title' => 'Visit',

        'actions' => [
            'index' => 'Visit',
            'create' => 'New Visit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'middle_name' => 'Middle name',
            'last_name' => 'Last name',
            'married_last_name' => 'Married last name',
            'first_name' => 'First name',
            'second_name' => 'Second name',
            'observation' => 'Observation',
            'entry_date' => 'Entry date',
            'exit_date' => 'Exit date',
            
        ],
    ],

    'state' => [
        'title' => 'State',

        'actions' => [
            'index' => 'State',
            'create' => 'New State',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'dependency' => [
        'title' => 'Dependency',

        'actions' => [
            'index' => 'Dependency',
            'create' => 'New Dependency',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_dependency' => 'Id dependency',
            'name' => 'Name',
            
        ],
    ],

    'state' => [
        'title' => 'States',

        'actions' => [
            'index' => 'States',
            'create' => 'New State',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'visit' => [
        'title' => 'Visits',

        'actions' => [
            'index' => 'Visits',
            'create' => 'New Visit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'middle_name' => 'Middle name',
            'last_name' => 'Last name',
            'married_last_name' => 'Married last name',
            'first_name' => 'First name',
            'second_name' => 'Second name',
            'entry_date' => 'Entry date',
            'exit_date' => 'Exit date',
            'state_id' => 'State',
            'dependency_id' => 'Dependency',
            'observation' => 'Observation',
            
        ],
    ],

    'state' => [
        'title' => 'States',

        'actions' => [
            'index' => 'States',
            'create' => 'New State',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'visit' => [
        'title' => 'Visits',

        'actions' => [
            'index' => 'Visits',
            'create' => 'New Visit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'middle_name' => 'Middle name',
            'last_name' => 'Last name',
            'married_last_name' => 'Married last name',
            'first_name' => 'First name',
            'second_name' => 'Second name',
            'entry_date' => 'Entry date',
            'exit_date' => 'Exit date',
            'state_id' => 'State',
            'dependency_id' => 'Dependency',
            'observation' => 'Observation',
            
        ],
    ],

    'visit' => [
        'title' => 'Visits',

        'actions' => [
            'index' => 'Visits',
            'create' => 'New Visit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ci' => 'Ci',
            'name' => 'Name',
            'middle_name' => 'Middle name',
            'last_name' => 'Last name',
            'married_last_name' => 'Married last name',
            'first_name' => 'First name',
            'second_name' => 'Second name',
            'entry_date' => 'Entry date',
            'exit_date' => 'Exit date',
            'observation' => 'Observation',
            'state_id' => 'State',
            'dependency_id' => 'Dependency',
            
        ],
    ],

    'dependency' => [
        'title' => 'Dependency',

        'actions' => [
            'index' => 'Dependency',
            'create' => 'New Dependency',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'dependency' => [
        'title' => 'Dependencies',

        'actions' => [
            'index' => 'Dependencies',
            'create' => 'New Dependency',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'visit' => [
        'title' => 'Visits',

        'actions' => [
            'index' => 'Visits',
            'create' => 'New Visit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'CI' => 'CI',
            'Full_Name' => 'Full Name',
            'First_Surname' => 'First Surname',
            'Second_Surname' => 'Second Surname',
            'Married_Surname' => 'Married Surname',
            'First_Name' => 'First Name',
            'Second_Name' => 'Second Name',
            'Observation' => 'Observation',
            'Entry_Datetime' => 'Entry Datetime',
            'Exit_Datetime' => 'Exit Datetime',
            'state_id' => 'State',
            'dependency_id' => 'Dependency',
            
        ],
    ],

    'visit' => [
        'title' => 'Visits',

        'actions' => [
            'index' => 'Visits',
            'create' => 'New Visit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'CI' => 'CI',
            'Full_Name' => 'Full Name',
            'First_Surname' => 'First Surname',
            'Second_Surname' => 'Second Surname',
            'Married_Surname' => 'Married Surname',
            'First_Name' => 'First Name',
            'Second_Name' => 'Second Name',
            'Reason' => 'Reason',
            'Observation' => 'Observation',
            'Entry_Datetime' => 'Entry Datetime',
            'Exit_Datetime' => 'Exit Datetime',
            'state_id' => 'State',
            'dependency_id' => 'Dependency',
            
        ],
    ],

    'meeting' => [
        'title' => 'Meetings',

        'actions' => [
            'index' => 'Meetings',
            'create' => 'New Meeting',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'CI' => 'CI',
            'Names' => 'Names',
            'First_Names' => 'First Names',
            'Reason' => 'Reason',
            'Observation' => 'Observation',
            'With_whom' => 'With whom',
            'Meeting_Date' => 'Meeting Date',
            'Entry_Datetime' => 'Entry Datetime',
            'Exit_Datetime' => 'Exit Datetime',
            'state_id' => 'State',
            
        ],
    ],

    'reportev' => [
        'title' => 'Reportev',

        'actions' => [
            'index' => 'Reportev',
            'create' => 'New Reportev',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            
        ],
    ],

    'role-admin-user' => [
        'title' => 'Role Admin Users',

        'actions' => [
            'index' => 'Role Admin Users',
            'create' => 'New Role Admin User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'roles_id' => 'Roles',
            
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'role-admin-user' => [
        'title' => 'Role Admin Users',

        'actions' => [
            'index' => 'Role Admin Users',
            'create' => 'New Role Admin User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'roles_id' => 'Roles',
            
        ],
    ],

    'reportea' => [
        'title' => 'Reportea',

        'actions' => [
            'index' => 'Reportea',
            'create' => 'New Reportea',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];