<main class="contenedor seccion">
        <h1>Conócenos</h1>
        <div class="seccion-icon">
            <div class="icon">
                <img src="build/img/idea.gif" alt="idea">
                <h4>¿Tienes una idea?</h4>
                <p>¿Alguna vez has soñado en ver tu historia en papel y no tienes experiencia o no sabes por dónde empezar?¿Necesitas a un escritor para que te asosore y te ayude?</p>
            </div>
            <div class="icon">
                <img src="build/img/handshake.gif" alt="handshake">
                <h4>Encuentra un escritor</h4>
                <p>Nosotros te buscamos al mejor escritor que puede llevarla a cabo. Sólo trabajamos con escritores especializados. Mandanos un resumen de tu idea y nosotros te pondremos en contacto con tu media naraja escritora.</p>
            </div>
            <div class="icon">
                <img src="build/img/growth.gif" alt="growth">
                <h4>Haz realidad tu sueño</h4>
                <p>No dejes pasar esta oportunidad. Un libro es tu legado en el mundo y puedes hacerlo con la mejor calidad.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h2>Algunos de Nuestros Escritores</h2>

        <?php
            include 'list_escritores.php';
        ?>


        <div class="view-more">
            <a href="/escritores" class="button-gray">Ver Todos</a>
        </div>
    </section>

    <section class="contact-background">
        <h2>¿Necesitas que te asesoremos con tus escritos?</h2>
        <hr>
        <p>Rellena el formulario de contacto</p>
        <a href="/contacto" class="button-gray">Contacto</a>
    </section>

    <div class="contedor seccion seccion-inferior">


        <?php
            include 'list_entradasblog.php';
        ?>

        <section class="testimonios">
            <h3>Nuestros Clientes Dicen</h3>
            <div class="testimonio">
                <blockquote>
                    "Ghostwriters me puso en contacto con un escritor fántastico. Entregó un contenido excelente y cumplió con los plazos establecidos. ¡Muy recomendable!"
                </blockquote>
            </div>
            <div class="nombre">
                Juana Doe
            </div>
        </div>
        </section>
    </div>