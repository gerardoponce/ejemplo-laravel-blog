<!-- Your application script -->
<script>

    // Personalizacion del grafico de registro
    const registerChart = new Chartisan({
        el: '#registerChart',
        url: "@chart('registerChart')",
        hooks: new ChartisanHooks()
        .colors(['#4AA4E0'])
        .legend({ bottom: 0 })
        .title({
            textAlign: 'center',
            left: '50%',
            text: 'N° de Usuarios registrados por mes',
        })
        .tooltip()
        .datasets([
            {
                type: 'line',
                smooth: true,
                lineStyle: { width: 3 },
                symbolSize: 8,
                animationEasing: 'cubicInOut',
                areaStyle: {}
            },
        ]),
    });

</script>