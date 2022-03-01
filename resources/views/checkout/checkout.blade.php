<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>Checkout</title>
</head>
<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
      <img class="mb-4 d-block mx-auto" src="{{ \Illuminate\Support\Facades\Storage::url("./images/logo.png") }}" alt="logo" width="142" height="72" />
      <h2 class=" ps-4">Checkout form</h2>
    </div>
  </div>
  <div class="container">
    <form novalidate class="mb-5">
      <div class="row g-3">
        <h4 class="mb-3">Billing Address</h4>
        <div class="col-sm-6">
          <label for="firstName" class="form-label">First Name</label>
          <input placeholder="John" required id="firtName" type="text" class="form-control" />
          <div class="invalid-feedback">Vaild first name is required.</div>
        </div>
        <div class="col-sm-6">
          <label for="lastName" class="form-label">Last Name</label>
          <input placeholder="Doe" required id="lastName" type="text" class="form-control" />
          <div class="invalid-feedback">Vaild last name is required.</div>
        </div>
        <div class="col-12">
          <label for="username" class="form-label">User Name</label>
          <div class="input-group">
            <span class="input-group-text">@</span>
            <input placeholder="johndoe" required id="username" type="text" class="form-control" />
            <div class="invalid-feedback">Vaild Username is required.</div>
          </div>
        </div>
        <div class="col-md-5">
          <label for="country" class="form-label">Country</label>
          <select id="country" class="form-control">
            <option value="">
              Choose...
            </option>
            <option value="Moldova">
              Moldova
            </option>
            <option value="Russia">
              Russia
            </option>
            <option value="Ukraine">
              Ukraine
            </option>
            <option value="Belarus">
              Belarus
            </option>
            <option value="Khazahstan">
              Khazahstan
            </option>
          </select>
          <div class="invalid-feedback">Vaild Country is required.</div>
        </div>
        <div class="col-md-4">
          <label for="state" class="form-label">State</label>
          <select id="state" class="form-control">
            <option value="">
              Choose...
            </option>
            <option value="Chisinau">
              Chisinau
            </option>
            <option value="Causeni">
              Causeni
            </option>
            <option value="stefanVoda">
              Stefan Voda
            </option>
            <option value="Cahul">
              Cahul
            </option>
            <option value="Triraspol">
              Triraspol
            </option>
          </select>
          <div class="invalid-feedback">Vaild State is required.</div>
        </div>
        <div class="col-3">
          <label for="postcode" class="form-label">Postcode</label>
          <input placeholder="1234" required id="postcode" type="number" class="form-control" />
          <div class="invalid-feedback">Vaild Postcode is required.</div>
        </div>
        <hr class="my-4">
        <div class="col-12">
          <div class="form-check">
            <input id="sameAddress" type="checkbox" class="form-check-input">
            <label class="form-check-label" for="sameAddress">Shipping address is the same as billing.</label>
          </div>
          <div class="form-check">
            <input id="safeInfo" type="checkbox" class="form-check-input">
            <label class="form-check-label" for="safeInfo">Save this info</label>
          </div>
        </div>
        <hr class="my-4">

        <h4 class="mb-3">Payments</h4>


        <div class="form-check">
          <input id="creditCard" type="radio" name="paymentMethod" class="form-check-input" required checked>
          <label for="creditCard">Credit Card</label>

        </div>
        <div class="form-check">
          <input id="directDebit" type="radio" name="paymentMethod" class="form-check-input" required>
          <label for="directDebit">Direct Debit</label>

        </div>
        <div class="form-check">
          <input id="paypal" type="radio" name="paymentMethod" class="form-check-input" required>
          <label for="paypal">PayPal</label>

        </div>
        <div class="row my-3 gy-3">
          <div class="col-md-6">
            <label for="fullName" class="form-label">
              Name on card
            </label>
            <input id="fullName" type="text" class="form-control">
            <small class="text-muted">
              Full name as displayed on card.
            </small>
            <div class="invalid-feedback">
              Name on the card is required.
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="cc-number">Credit Card Number</label>

            <input id="cc-number" type="text" class="form-control">

            <div class="invalid-feedback">
              Credit Card Number is required.
            </div>
          </div>
          <div class="col-md-3">
            <label class="form-label" for="cc-expire">Expiration</label>

            <input id="cc-expire" type="text" class="form-control">

            <div class="invalid-feedback">
              Expiration is reqired
            </div>
          </div>
          <div class="col-md-3">
            <label class="form-label" for="cc-cvv">CVV</label>

            <input id="cc-cvv" type="text" class="form-control">

            <div class="invalid-feedback">
              Expiration is reqired
            </div>
          </div>
          <hr class="my-4">
          <button class="btn btn-primary btn-lg btn-block">Continue to checkout</button>


        </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>

</html>