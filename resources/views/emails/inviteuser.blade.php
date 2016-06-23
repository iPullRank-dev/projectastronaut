<p>
Hey, <?php echo $user->full_name ?>:
</p>
<p>
<?php echo $user-> inviter ?>(<?php echo $user-> invitermail ?>) has sent you some exciting information about your site that they want you to check out.
</p>
<p>
We analyzed your site and discovered some interesting information about how you’re ranking on Google. We hate to keep you in suspense so here’s the link:
</p>
<p>
URL: <a>http://vector.ipullrank.com/display-report=<?php echo $user->url ?></a>
</p>
<p>
Thank you for taking the time to view your report. We’d love to hear your thoughts on our findings, we've included our contact info below.
</p>
<p>
Sincerely,
</p>
<p>
The iPullRank Team
</p>
<p>
Message from <?php echo $user-> inviter ?>: <?php echo $user->msg ?>
</p>