@extends ('layouts.plantilla')
@section ('content')

    <main>
        <section>
            <div class="container-agendar custom-px-10">
                <h1 class="text-center">Reserva tu Cita</h1>
                <div class="text-center mt-5">
                    <div class="step-circle "></div>
                    <div class="step-circle "></div>
                    <div class="step-circle "></div>
                    <div class="step-circle "></div>
                </div>
                <h2 class="pt-5 pb-2">Horario</h2>

                @if(count(($horarios)) == 0)
                <p class="text-center">La fecha no tiene horarios dispononibles actualmente.</p>
                @else
                <form action="{{ route('paypal') }}" method="post" id="horarioForm">
                    @csrf
                    <select class="form-select" name="id_shift">
                        <option selected>Selecciona el horario</option>
                        @foreach($horarios as $horario)
                            <option value="{{ $horario->id }}">{{ $horario->horario }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name = "id_doctor" id="iddoctor" value="{{$horarios[0]->doctor_id}}">
                    <h2 class="pt-5 text-center">S/ {{$doctor->Specialty->costo}}</h2>
                    <input type="hidden" name="precio" value="1">
                    <div class="pt-5 text-center">
                        <input type="submit" class="btn btn-info"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" value="Pagar">
                    </div>
                </form>
                @endif
            </div>
        </section>
    </main>

    <!-- partial -->

@endsection