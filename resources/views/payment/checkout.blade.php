@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('title', 'Halaman Pembayaran')

@push('scripts')
    
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('services.midtrans.client_key') }}"></script>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h4 class="card-title mb-0">Selesaikan Pembayaran Anda</h4>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info">
                        Anda akan membayar untuk <strong>Pesanan #{{ $order->id }}</strong>
                    </div>

                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Layanan</th>
                                <td>{{ $order->service_name }}</td>
                            </tr>
                            <tr>
                                <th>Total Tagihan</th>
                                <td class="fw-bold fs-5 text-primary">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4 text-center">
                        <p class="text-muted">Klik tombol di bawah untuk membuka jendela pembayaran yang aman dari Midtrans.</p>
                        <div class="d-grid">
                            <button id="pay-button" class="btn btn-primary btn-lg">
                                <i class="fas fa-shield-alt me-2"></i> Lanjutkan Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <small class="text-muted">Pembayaran aman dan diproses oleh Midtrans.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 
  document.addEventListener('DOMContentLoaded', function() {
      console.log('DEBUG: Halaman sudah siap. Script pembayaran berjalan.');

     
      var payButton = document.getElementById('pay-button');
      
      
      if(payButton) {
          console.log('DEBUG: Tombol "Lanjutkan Pembayaran" berhasil ditemukan.');
          
          payButton.addEventListener('click', function () {
            console.log('DEBUG: Tombol diklik. Mencoba memanggil Midtrans...');

            
            if (window.snap) {
                console.log('DEBUG: window.snap ditemukan. Token: {{ $snapToken }}');
                
                
                window.snap.pay('{{ $snapToken }}', {
                  onSuccess: function(result){
                    console.log('SUCCESS:', result);
                    window.location.href = '{{ route("laundry.lacak") }}?payment_success=1';
                  },
                  onPending: function(result){
                    console.log('PENDING:', result);
                    alert("Menunggu pembayaran Anda! Anda bisa menyelesaikan pembayaran nanti.");
                    window.location.href = '{{ route("laundry.lacak") }}';
                  },
                  onError: function(result){
                    console.error('ERROR:', result);
                    alert("Pembayaran gagal!");
                    window.location.href = '{{ route("laundry.lacak") }}';
                  },
                  onClose: function(){
                    console.log('CLOSED: Popup pembayaran ditutup oleh pengguna.');
                    alert('Anda menutup popup pembayaran sebelum menyelesaikannya.');
                  }
                });
            } else {
                console.error('FATAL ERROR: window.snap tidak ditemukan. Script Midtrans mungkin gagal dimuat.');
                alert('Komponen pembayaran gagal dimuat. Silakan refresh halaman dan coba lagi.');
            }
          });
      } else {
          console.error('FATAL ERROR: Tombol dengan id "pay-button" tidak ditemukan di halaman.');
      }
  });
</script>
@endsection
