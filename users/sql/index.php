<?php
  require $_SERVER['DOCUMENT_ROOT'] . "/helpers/insertKeyValue.php";

  // sql queryies
  function getUsersQuery() {
    return "SELECT `email` FROM `users`";
  };

  function getUserProfileQuery($email) {
    return "SELECT `email`, `lastname`, `firstname`, `address`, `addresses`, `phone`, `birthday`, `ssn`, `goals`, `serviceID` FROM `userProfile` WHERE " . "`email`='" . $email . "'";
  };

  function getUserProfileCheckQuery($email) {
    return "SELECT * FROM `userProfile` WHERE email='$email' LIMIT 1";
  };

  function getUserCheckQuery($email) {
    return "SELECT * FROM `users` WHERE email='$email' LIMIT 1";
  };

  function getUserScoreCheckQuery($email) {
    return "SELECT * FROM `userScoreCheck` WHERE email='$email' LIMIT 1";
  };

  function getCreditCheckQuery($email) {
    return "SELECT `email`, `username`, `password`, `location` FROM `userScoreCheck` WHERE " . "`email`='" . $email . "'";
  }

  function getCreateUserProfileQuery($new_user, $addresses) {
    return "INSERT INTO `userProfile` (`" . (getProps($new_user)) . "`, `addresses`) VALUES ('" . (getValues($new_user)) . "',  '$addresses')";
  }

  function getRegisterUserQuery($new_user) {
    return "INSERT INTO `users` (`" . (getProps($new_user)) . "`) VALUES ('" . (getValues($new_user)) . "')";
  }

  function getCreateCreditCheckQuery($new_user) {
    return "INSERT INTO `userScoreCheck` (`" . (getProps($new_user)) . "`) VALUES ('" . (getValues($new_user)) . "')";
  }

  function getUpdateUserProfileQuery($user, $email) {
    $updated_user = "`firstname`='" . $user['firstname'] . "', `lastname`='" . $user['lastname'] . "', `address`='" . $user['address'] . "', `addresses`='" . $user['addresses'] . "', `phone`='" . $user['phone'] . "', `birthday`='" . $user['birthday'] . "', `ssn`='" . $user['ssn'] . "', `goals`='" . $user['goals'] . "', `serviceID`='" . $user['serviceID'] . "'";
    return "UPDATE `userProfile`  SET " . $updated_user . " WHERE `email`='" . $email . "'";
  }

  function getUpdateUserScoreCheckProfileQuery($username, $location, $password, $email) {
    $updated_user = $updated_user = "`username`='" . $username  . "', `location`='" . $location . "', `password`='" . $password . "'";
    return "UPDATE `userScoreCheck`  SET " . $updated_user . " WHERE `email`='" . $email . "'";
  }
