# Simple PHP Basket

Acme Widget Co -PHP Challenge<br/>

## Task:

Acme Widget Co <br/>
Acme Widget Co are the leading provider of made up widgets and they’ve contracted you to create a proof of concept for their new sales system. <br/>

They sell three products – <br/>
Red Widget(R01) $32.95 <br/>
Green Widget(G01) $24.95 <br/>
Blue Widget(B01) $7.95 <br/>

To incentivise customers to spend more, delivery costs are reduced based on the amount spent. <br/>
Orders under $50 cost $4.95. For orders under $90, delivery costs $2.95. <br/>
Orders of $90 or more have free delivery. <br/>
They are also experimenting with special offers. The initial offer will be “buy one red widget, get the second half price”. <br/>

Your job is to implement the basket which needs to have the following interface – <br/>
• It is initialised with the product catalogue, delivery charge rules, and offers (the format of how these are passed it up to you) <br/>
• It has an add method that takes the product code as a parameter. <br/>
• It has a total method that returns the total cost of the basket, taking into account the delivery and offer rules. <br/>

Here are some example baskets and expected totals to help you check your implementation. <br/>

Products Total <br/>

- B01, G01 $37.85 <br/>
- R01, R01 $54.37 <br/>
- R01, G01 $60.85 <br/>
- B01, B01, R01, R01, R01 $98.27 <br/>

## Project Solution.

All comments exist on important line. <br/>
I've made Basket class which contains addProduct, removeProduct, getProduct, getTotalCost functions and variables. <br/>
Also used PHP session for saving Basket object. <br/>
Basket works as really same as E commerce cart. <br/>
GetTotalCost function works based on initial offer and rules that you provided. <br/>
