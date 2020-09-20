## This is an idea about cleaning controllers in Laravel. 

I have seen a lot of projects where the controller checks the existence of especific keys on the input, to attribute boolean values to them
before pass them to the models for persistence.

My vision is that this kind of operation should not be part of controllers behaviour because models can be accessed through other interfaces
beyond the HTTP protocol, so I moved this behaviour to the fill method of Eloquent.

I surely could simply set a default value for each boolean property on the model, but I was interested to see other viable alternatives.
