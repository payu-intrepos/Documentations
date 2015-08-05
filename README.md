# Android SDK Integration Document Version 4.0

<b>Overview</b>
<p>This document describes the steps for technical integration process between 
merchant's app and PayU SDK for enabling online transactions.</p>

<b>PayU Payment Gateway</b>
<p>PayU offers electronic payment services to merchant website through its 
partnerships with various banks and payment instrument companies. Through 
PayU, the customers would be able to make electronic payments through a variety
of modes which are mentioned below:</p>

* Credit cards
* Debit cards
* Online net banking accounts
* EMI payments
* Cash Cards

<p>PayU also offers an online interface (known as PayU Dashboard) where the 
merchant has access to various features like viewing all the transaction details 
and can be accessed through https://www.payu.in by using the username and 
password provided to you.</p>


<b>SDK Integration</b>
<p>The merchant can integrate with PayU by using one of the below methods:</p>

* Non-Seamless Integration
<p>In Non-Seamless Integration, the Customer would move from the Merchant's 
Activity to PayU's payment options activity.There he would select the payment 
options and enter the necessary details. After this PayU would redirect the 
customer to the bank for further processing.</p>

* Seamless Integration(Using Custom UI)
<p>In this mode, the merchant needs to collect the details on their own and then 
send them to PayU's SDK.</p>
