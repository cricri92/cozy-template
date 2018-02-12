<h1 class="section-title">Información del Agente</h1>
<!-- BEING AGENT INFORMATION -->
<div class="property-agent-info">
    <div class="agent-detail col-md-4">
        <div class="image">
            <img alt="" src="{{ $realtor['photo'] }}" />
        </div>

        <div class="info">
            <header>
                <h2>{{ $realtor['first_name'] }} {{ $realtor['last_name'] }}<small>{{ $realtor['address'] }}</small></h2>
            </header>

            <ul class="contact-us">
                <li><i class="fa fa-envelope"></i><a href="mailto:{{ $realtor['email'] }}">{{ $realtor['email'] }}</a></li>
                <li><i class="fa fa-map-marker"></i> {{ $realtor['address'] }}</li>
                <li><i class="fa fa-phone"></i> {{ $realtor['cell_phone'] }}</li>
            </ul>
        </div>
    </div>

    <form class="form-style col-md-8" action="" method="POST">  
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="col-sm-6">
            <input type="text" name="name" placeholder="Nombre" class="form-control required fromName" />
        </div>

        <div class="col-sm-6">
            <input type="text" name="name" placeholder="Apellido" class="form-control required fromName" />
        </div>

        <div class="col-sm-12">
            <input type="email" name="email" placeholder="Email" class="form-control required fromEmail" />
        </div>

        <div class="col-sm-12">
            <input type="text" name="subject" placeholder="Asunto" class="form-control required subject" />
            <textarea name="Message" placeholder="Mensaje" class="form-control required"></textarea>
        </div>

        <div class="col-sm-12"> 
            <input type="checkbox" name="receive_newsletter" placeholder="Deseo recibir noticias y actualizaciones sobre los inmuebles ofertados."/>
            Deseo recibir noticias y actualizaciones sobre los inmuebles ofertados.
        </div>
    
        <button class="btn btn-default-color submit_form"><i class="fa fa-envelope"></i> Enviar</button>
    </form>
</div>
<!-- END AGENT INFORMATION -->