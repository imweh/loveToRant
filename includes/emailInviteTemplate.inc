<?php
$mailTemplate = "<html><head><title>Love To Rant | Registration Acknowledgement</title></head><body>";
$mailTemplate .= "<table align=\"center\" style=\"width: 320px; background-color: #fff; font-family: arial;border-collapse: collapse; border-left: 1px solid #999999; border-right: 1px solid #999999;\">";
$mailTemplate .= "<tr><td align=\"center\" style=\"padding: 6px; background-repeat: repeat-x;background-position: 0px 0px;background-image: url(http://www.lovetorant.com/images/email/topBar_BG.png);border-right: 1px solid #999999;\">";
$mailTemplate .= "<a href=\"http://www.lovetorant.com/rant.php\" style=\"border:none;\"><img src=\"http://www.lovetorant.com/images/startRant_button.png\" /></a></td>";
$mailTemplate .= "<td align=\"center\" style=\"padding: 6px;background-repeat: repeat-x;background-position: 0px 0px;background-image: url(http://www.lovetorant.com/images/email/topBar_BG.png); width:30px;\">";
$mailTemplate .= "<a href=\"http://www.tritter.com/love_to_rant\" style=\"border:none;\"><img src=\"http://www.lovetorant.com/images/email/twitter_64.png\" /></a></td>";
$mailTemplate .= "<td align=\"center\" style=\"padding: 6px;background-repeat: repeat-x;background-position: 0px 0px;background-image: url(http://www.lovetorant.com/images/email/topBar_BG.png); width:30px;\">";
$mailTemplate .= "<a href=\"https://www.facebook.com/pages/Love-To-Rant/229939987077625?sk=wall\" style=\"border:none;\"><img src=\"http://www.lovetorant.com/images/email/facebook_64.png\" /></a></td>";
$mailTemplate .= "<td align=\"center\" style=\"padding: 6px;background-repeat: repeat-x;background-position: 0px 0px;background-image: url(http://www.lovetorant.com/images/email/topBar_BG.png);\">";
$mailTemplate .= "<a href=\"http://www.lovetorant.com/invite.php\" style=\"border:none;\"><img src=\"http://www.lovetorant.com/images/invite_button.png\" /></a></td>";
$mailTemplate .= "</tr><tr><td colspan=\"4\" align=\"center\"><img alt=\"www.loveToRant.com logo\" title=\"www.loveToRant.com logo\" src=\"http://www.lovetorant.com/images/email/email_logo_1.png\" style=\"width: 320px; height: 75px;\" />";
$mailTemplate .= "</td></tr><tr><td colspan=\"4\"  align=\"left\" style=\"padding: 6px; padding-top: 15px; font-size:14px; font-family: arial;\">$myName would like you to check out LoveToRant.com - a place to speak your mind.<br />To check it out go to http://www.LoveToRant.com.";
$mailTemplate .= "</td></tr><tr><td colspan=\"4\"  align=\"left\" style=\"padding: 6px; font-size:14px; font-family: arial;\">We all have a need to get things out sometimes. Sometimes what we have to say is good; sometimes it is bad. ";
$mailTemplate .= "<ul style=\"margin-left: -7px;\">";
$mailTemplate .= "<li><span style=\"font-weight: bold;\">Anonymously</span> express yourself.</li>";
$mailTemplate .= "<li>Speak your mind.</li>";
$mailTemplate .= "<li>Be heard.</li>";
$mailTemplate .= "<li>Listen to others.</li>";
$mailTemplate .= "<li>Think of it as self therapy!</li>";
$mailTemplate .= "</ul></td></tr>";
$mailTemplate .= "<tr><td colspan=\"3\"  align=\"right\" style=\"padding: 0px; padding-bottom:6px; font-size:14px; font-family: arial;\">";
$mailTemplate .= "<a href=\"http://www.lovetorant.com/rant.php\" style=\"border:none;\"><img alt=\"Start Ranting Button\" title=\"Start Ranting Button\" src=\"http://www.lovetorant.com/images/email/startRant_button_big.png\" style=\"width: 171px; height: 36px;\" /></a>";
$mailTemplate .= "</td><td>&nbsp;</td></tr>";
$mailTemplate .= "<tr><td colspan=\"4\"  align=\"left\" style=\"padding: 6px; font-size:14px; font-family: arial;\">";
$mailTemplate .= "	Do not reply to this email.<br />Direct replies to $myName at <a href=\"mailto:$myEmail\">$myEmail</a>";
$mailTemplate .= "</td></tr><tr><td align=\"center\" colspan=\"4\"  align=\"left\" style=\"text-align: center; padding: 6px; font-size:12px; font-family: arial;\">";
$mailTemplate .= "	For more information visit <a href=\"http://www.LoveToRant.com\">http://www.LoveToRant.com</a> or contact us at <a href=\"mailto:info@lovetorant.com\">info@lovetorant.com</a>";
$mailTemplate .= "</td></tr><tr><td align=\"center\" colspan=\"4\"  align=\"left\" style=\"text-align: center; padding: 3px; font-size:10px; font-family: arial;\">";
$mailTemplate .= "	To opt out of future invitations please <a href=\"http://www.LoveToRant.com/inviteOptOut.php?email=$aFriend\">click here</a> or contact us at <a href=\"mailto:info@lovetorant.com\">info@lovetorant.com</a>";
$mailTemplate .= "</td></tr><tr><td align=\"center\" colspan=\"4\"  align=\"left\" style=\"text-align: center; padding: 2px; font-size:10px; font-family: arial;\">";
$mailTemplate .= "	&copy;2011 LoveToRant.com | <a href=\"http://www.LoveToRant.com/privacy.php\" target=\"_self\">Privacy Policy</a>";
$mailTemplate .= "</td></tr>";
$mailTemplate .= "<tr><td align=\"center\" colspan=\"4\"  align=\"left\" style=\"text-align: center; padding: 2px; font-size:10px; font-family: arial;\">Liam Edward LLC | PO Box 237 Evesham, NJ 08053";
$mailTemplate .= "</td></tr><tr><td align=\"center\" colspan=\"4\"  align=\"left\" style=\"text-align: center; padding: 2px; font-size:10px; font-family: arial;\">";
$mailTemplate .= "<a href=\"http://www.liamedward.com\">www.LiamEdward.com</a></td></tr></body</html>";

?>