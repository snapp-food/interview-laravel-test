#Tasks

1.  Create an endpoint to submit an order by authenticated users.

    1.  Create `Order` model with these columns:

        * restaurant_id
        * created_at
        * updated_at
        * user_id
        * status

    2.  Orders must have some products that belong to only one restaurant.

    3.  Create a controller to submit order
        
2.  Send SMS to the user after order been submitted. We need to have two SMS providers to be able to switch between
    them. Each SMS provider must have own service for sending SMS. There are two mock APIs for SMS providers:
    https://demo3224310.mockable.io/first_provider
    https://demo3224310.mockable.io/second_provider

4.  Dispatch an event after submitting order and send the SMS (previous task) on an event subscriber that is subscribing
    to the created event.

5.  [optional] Add an role based authorization layer for checking access to endpoints:

    * Only authenticated users can submit order.
    * Only admin users can create and modify restaurants and products. 
    
6.  [optional] Add endpoints to list, accept and reject orders. These endpoints must be accessible by admin users.
