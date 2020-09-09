<script>
    const categoryChart = new Chartisan({
        el: '#categoryChart',
        url: "@chart('categoryChart')",
        hooks: new ChartisanHooks()
        .legend({ bottom: 0 })
        .tooltip()
        .title({
            textAlign: 'center',
            left: '50%',
            text: 'Categorias',
        })
        .colors(['#4AA4E0'])
    });
</script>