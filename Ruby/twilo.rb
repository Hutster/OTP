# THIS IS A TEST DOCUMENT THAT SENDS A TEXT TO SEAN
# EXECUTED VIA COMMAND LINE AND IT WORKS

require 'rubygems'
require 'twilio-ruby'
 
# Get your Account Sid and Auth Token from twilio.com/user/account
account_sid = 'ACb96a18da857931b850c16568a0275715'
auth_token = 'a4f4afdaa4f80f87e50d816b2ce7db9f'
@client = Twilio::REST::Client.new account_sid, auth_token
 
message = @client.account.messages.create(:body => "Jenny please?! I love you <3",
    :to => "+13306714458",     # Replace with your phone number
    :from => "+12243741995")   # Replace with your Twilio number
puts message.sid