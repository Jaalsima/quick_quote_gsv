<x-guest-layout>
    <div>
        <x-welcome-nav />
        <!-- Contenido Principal de Welcome -->
        <div class="container mx-auto p-4">
            <!-- Contenido Principal de Welcome -->
            <h1 class="text-3xl font-bold mb-4">Bienvenido a Quick Quote GSV Ingeniería</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Sección de Actividades Recientes -->
                <div>
                    <h2 class="text-xl font-semibold mb-2">Actividades Recientes</h2>
                    <p>Aquí encontrarás un resumen de las últimas cotizaciones realizadas, incluyendo detalles sobre los clientes, fechas y estados actuales.</p>
                    <!-- Puedes incluir aquí un componente Blade para mostrar la lista de cotizaciones recientes -->
                </div>

                <!-- Sección de Estadísticas Clave -->
                <div>
                    <h2 class="text-xl font-semibold mb-2">Estadísticas Clave</h2>
                    <p>Consulta estadísticas importantes relacionadas con el rendimiento de las cotizaciones, ingresos generados y otros datos relevantes.</p>
                    <!-- Puedes incluir aquí gráficos o componentes Blade específicos para las estadísticas -->
                </div>

                <!-- Sección de Acciones Rápidas -->
                <div>
                    <h2 class="text-xl font-semibold mb-2">Acciones Rápidas</h2>
                    <p>Aquí encontrarás enlaces rápidos para realizar acciones clave, como crear una nueva cotización, revisar configuraciones o acceder a la ayuda.</p>
                    <!-- Puedes incluir aquí botones o enlaces para las acciones rápidas -->
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
