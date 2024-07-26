@extends('layouts.main')
@section('title', 'GenieAcs Bot | Checkout Page')

@section('checkout')
<div class="row justify-content-center">
    <div class="row justify-content-center">
        <div class="center-pop" id="snap-container" style="z-index: 1">
        </div>
    </div>
    <div class="col-sm-8 col-8 col-md-8" id="transaction-card">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title text-warning">Detail Transaction</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mx-auto">
                        <h2 class="card-title mb-3">Order ID : {{ $transaction->order_id }}</h2>
                        <h5 class="card-title mb-3">Service : {{ $transaction->service }}</h5>
                        <h5 class="card-title mb-3">Token : {{ $transaction->token }}</h5>
                        <h5 class="card-title mb-3">URL : {{ $transaction->url }}</h5>
                        <h5 class="card-title mb-3">MAC Address : {{ $transaction->mac }}</h5>
                        <h5 class="card-title mb-3">Price : IDR. {{ number_format($transaction->gross_amount, 0, ',', '.') }}/Month</h5>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" onclick="hideTransactionCard()" id="pay-button" class="btn btn-success btn-lg btn-block col-lg-12 col-md-12 col-12">
                        Pay
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function hideTransactionCard() {
        var transactionCard = document.getElementById('transaction-card');
        transactionCard.style.display = 'none';
    }

    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('{{$snapToken}}', {
        embedId: 'snap-container',
        onSuccess: function (result) {
            window.location.href = 'https://3ca0-118-96-18-231.ngrok-free.app/transactions'
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    });
    </script>  
@endsection
