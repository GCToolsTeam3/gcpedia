<?php
 
/**
* Internationalisation file for the ConfirmUsersEmail extension
* If you are good at translating messages, please contact me :)
*/
 
function efConfirmUsersEmailMessages() {
$messages = array(
 
/* English (Ryan Schmidt) */
'en' => array(
'confirmusersemail' => 'Confirm Email Addresses',
'confirmusersemail-header' => 'You may use this form to confirm a user\'s email address. Actions here are not logged publicly, but the user will be notified via email that their address got confirmed.',
'confirmusersemail-username' => 'Username',
'confirmusersemail-confirm' => 'Confirm Email',
'confirmusersemail-sendsubject' => 'Email Address Confirmed',
'confirmusersemail-sendbody' => 'Your GCPEDIA email address was manually confirmed by the GCPEDIA administrator.',
'confirmusersemail-success' => 'Email address for [[User:$1|$1]] successfully confirmed',
'confirmusersemail-alreadyconfirmed' => '[[User:$1|$1]] already has a confirmed email address',
'confirmusersemail-setconfirmed' => 'This user already has a confirmed email address ($1), you may use the form below to change it',
'confirmusersemail-noemail' => '[[User:$1|$1]] has not specified an email address in their Preferences',
'confirmusersemail-setemail' => 'This user does not currently have an email address specified. If you wish to set one, you may do so using the form below.',
'confirmusersemail-email' => 'Email address',
'confirmusersemail-set' => 'Set and Confirm Email',
),
 
/* deutsch (Thilo Graf) */
'de' => array(
'confirmusersemail' => 'e-Mail best�tigen',
'confirmusersemail-header' => 'Sie k�nnen dieses Formular verwenden, um die E-Mail-Adresse der Nutzer zu best�tigen. Dies erfolgt nicht �ffentlich, sondern der Benutzer wird per E-Mail benachrichtigt, dass die Adresse  best�tigt wurde.',
'confirmusersemail-username' => 'Benutzername',
'confirmusersemail-confirm' => 'best�tige Email',
'confirmusersemail-sendsubject' => 'Email-Adresse best�tigt',
'confirmusersemail-sendbody' => 'Ihre Email Addresse wurde best�tigt f�r $1.',
'confirmusersemail-success' => 'Email Addresse f�r [[User:$1|$1]] erfolgreich best�tigt',
'confirmusersemail-alreadyconfirmed' => '[[User:$1|$1]] hat seine Email-Adresse bereits best�tigt',
'confirmusersemail-setconfirmed' => 'Dieser Benutzer hat bereits eine Email-Adresse best�tigt ($1), Sie k�nnen das Formular dazu verwenden, um �nderungen vorzunehmen',
'confirmusersemail-noemail' => '[[User:$1|$1]] hat keine E-Mail-Adresse in seinen Einstellungen angegeben',
'confirmusersemail-setemail' => 'Dieser Benutzer hat bisher keine E-Mail-Adresse in seinen Einstellungen angegeben. Wenn Sie m�chten, k�nnen Sie dies mit dem unten stehenden Formular tun.',
'confirmusersemail-email' => 'Email Adresse',
'confirmusersemail-set' => 'Angeben und best�tigen der E-Mail-Adresse',
), 
 
);
 
return $messages;
 
}