# Coffee machine challenge

The goal of this assesment is to try to understand your coding skills, architectural decisions and the overall problem-solving abilities.

## Challenge

The challenge is to build a simple API to interact with a coffee machine, using the Laravel framework, and a Vue interface to interact with the API.

We provided an Interface to implement and use on the API.

The API should have endpoints to allow the following actions:

- [x] Make one Espresso
- [x] Make one Double Espresso
- [x] Make one Americano
- [x] Check the status of the machine
- [x] Fill the water container
- [x] Fill the coffee container

The Vue interface should allow the following actions:

- [x] Press a button to make one Espresso
- [x] Press a button to make one Double Espresso
- [x] Press a button to make one Americano
- [x] Press a button to display the status
- [x] Provide an input to fill the water container
- [x] Provide an input to fill the coffee container
- [x] Display any messages received from the API

## Coffee machine requirements

- [x] The standard WaterContainer contains 2 litres but other sizes can be attached.
- [x] The standard CoffeeContainer holds 500 grams of coffee but other sizes can be attached.
- [x] A single espresso uses 8 grams of coffee and 24 ml of water.
- [x] A double espresso uses 16 grams of coffee and 48 ml of water.
- [x] A single ristretto used 8 grams of coffee and 16 ml of water.
- [x] A single americano uses 16 grams of coffee and 148 ml of water.

## Requirements

- [x] Return human readable error messages:
  - [x] when at least one of the containers is empty when trying to make coffee
  - [x] when a container will overflow if more liters/grams are added
  - [x] any other exception occurs
- [x] You are free to use whatever you want to save the state of the coffee machine between requests.
- [x] The naming of API endpoints and returned data is up to you.
- [x] Use a docker container for the development.
- [x] Please include clear instructions on how to run your solution and list any assumptions that you have made.
- [x] If you have any questions or need any clarifications, feel free to make assumptions, but make sure to write down which assumptions you made.

## To easy? Nice to have then

- Multiple storage types for the state and an easy you to switch between them.
- Unit tests.
- A Postman collection for interacting with the API.
- A nice design for the Vue interface.

## Limitations

You MUST NOT change any of the existing methods defined in the interface except to use another namespace.
