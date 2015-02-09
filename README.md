There are other ways to generate specific post page buy url. Specially using the class c_ws_plugin__s2member_sp_access. However, this will generate only link and won't check payment status. 

So what I did here is little different. Thanks s2Member team for this kb article  - thanks for the kb article http://www.s2member.com/kb/building-an-api-notification-handler/

First of all, a notification url like this need to be setup at s2Member > API/Notifications (under Specific Post/Page ~ Sale Notifications) -> http://site.com/?s2_payment_notification=yes&access=%%sp_access_url%%&ip=%%user_ip%%

[s2_payment_notification -> can be changed, but need to be changed on s2_payment_notification function as well ($_GET variable)]

Whenever a specific post/page sale happens, it will store buyers link and IP on /plugins/s2member-logs/links.log and /plugins/s2member-logs/ip.log . 

Later, with shortcode [sps2 name="Any name of the link" id="any id" error="Error Message"] the link can be shown in a funnel page. It will look for latest user IP and generated link on links.log and ip.log files. After then, it will check  user IP with $_SERVER["REMOTE_ADDR"] . If the current IP and last stored IP matches, the user will see the link otherwise the error message. Instead of last IP and current user IP combination, shown link can be also customized combing links and ips to an array with some custom coding.

By default, the static link can be shared with anyone. This functions will just make sure proper person is seeing it in proper page. Doesn't check its uses later. So as a second level of security, s2Member IP based restriction should be enabled.
