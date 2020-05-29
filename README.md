# Commerce 2.x Example 3
Example of adding a custom Ajax command to Add to Cart form variation updates.

In Commerce 1.x, we provided a hook that let you alter the array Ajax commands evaluated in response to product attribute selection on Add to Cart forms. We offer the same opportunity for doing so in Commerce 2.x, but the implementation looks a little different - it replaces the alter hook with an event subscriber.

The example in this repository subscribes to the appropriate event (the product variation Ajax change event) and adds an alert command that shows the ID of the product variation now represented by the Add to Cart form.
