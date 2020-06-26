# Twilio-SMS-Callback

This repo contains code and configuration settings necessary to implement a Twilio SMS callback service via  
a SQL Anywhere DBMS web service. 

Callbacks are REST based messages returned by the Twilio SMS API that provide status updates on text messages as 
they progress through an attempt to be sent. A typical callback message includes information identifying 
the message, and the messages status, which is generally "sent", "delivered", or "undelivered".

Processing callbacks allow applications to know and present to users the real-time status of message processing. 


## How SMS Text Messages Are Processed (typically)

1. The application forms an SMS text message (eg. from, to, body, callback URL),
2. The application posts the message to the Twilio SMS API,
3. The Twilio SMS API responds with a success "201" response code, with the status "queued", 
4. After forwarding the message to a commercial carrier, the Twilio API provides a "sent" callback message, 
5. The application's web service receives and processes the "sent" callback message, 
6. After the message is successfuly processed by the commerical carrier, the Twilio API provides a "delivered" callback message,
7. The application's web service receives and processes the "delivered" callback message. 


## Installation

To implement this process within a SQL Anywhere web service, do the following:

1. [Add the "xs" flag to your SQL Anywhere server configuration,](/Server-Config.png)
1. [Create one or more database procedures that will be used to process the callbacks.](/sp_sms_update)
1. Create a SQL Anywhere webservice to receive the callbacks,
	1. [Inititialize the web service,](/Webservice-Config-Main.png)
	1. [Set the web service to forward messages to your (head) stored procedure,](/Webservice-Config-SQL-Statement.png)
1. Configure the callback parameter in future messages, eg. http://{host name}:{port number}/{SQL Anywhere server name}/{SQL Anywhere web service name}


## Contributing
Pull requests are welcome. Please open an issue to discuss any changes you would like to make or see.


## Help
Please open an issue to receive help. 


## License
[MIT](https://choosealicense.com/licenses/mit/)
