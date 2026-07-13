<div class="sidebar">

    <h4 class="text-center mb-4">{{-- ⚡  --}}
        <img src="{{ asset('img/logo.jpeg') }}"
            style="
        width: 100%;
        max-width: 150px;
        height: auto;
        display: block;
        margin: 0 auto;
    ">
    </h4>
    <a href="{{ url('/orders') }}">{{-- 📥 --}} <i class="bi-file-earmark-text"></i>Orçamentos</a>
    <a href="{{ url('/products') }}">{{-- 📦 --}} <i class="bi-box"></i> Productos</a>
    <a href="{{ url('/services') }}">{{-- 🧾 --}} <i class="bi-tools"></i> Servicios</a>

  {{--   <a href="#">📊 Reportes</a>
    <a href="#">⚙️ Configuración</a> --}}

</div>
