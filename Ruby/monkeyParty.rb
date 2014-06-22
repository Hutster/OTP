require 'rubygems'
require 'twilio-ruby'


account_sid = 'ACb96a18da857931b850c16568a0275715'
auth_token = 'a4f4afdaa4f80f87e50d816b2ce7db9f'

client = Twilio::REST::Client.new account_sid, auth_token
 
from = "+16307967918" # Your Twilio number
 
friends = {
"+13306714458" => "Curious George",
"+18472261310" => "Local Thom"
}
friends.each do |key, value|
  client.account.messages.create(
    :from => from,
    :to => key,
    :body => "Hey #{value}, Monkey party at 6PM. Bring Bananas!"
  ) 
  puts "Sent message to #{value}"
end