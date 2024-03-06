<?php exit; ?>
[2021-11-30 13:28:17] ERROR: Form 374 > Mailchimp API error: 400 Bad Request. Invalid Resource. naim***@se*************.com has signed up to a lot of lists very recently; we're not allowing more signups for now

Request: 
PATCH https://us9.api.mailchimp.com/3.0/lists/13c2dafbc4/members/362c8e15cb07c817104f5ace259ab1f6

{"status":"pending","email_address":"naim***@se*************.com","interests":{},"merge_fields":{},"email_type":"html","ip_signup":"127.0.0.1","tags":[]}

Response: 
400 Bad Request
{"type":"https://mailchimp.com/developer/marketing/docs/errors/","title":"Invalid Resource","status":400,"detail":"naim***@se*************.com has signed up to a lot of lists very recently; we're not allowing more signups for now","instance":"f99d3e7a-a09a-17f4-9352-e0e7b25de1b6"}
