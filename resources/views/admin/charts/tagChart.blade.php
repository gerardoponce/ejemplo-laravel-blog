<script>
    const tagChart = new Chartisan({
        el: '#tagChart',
        url: "@chart('tagChart')",
        hooks: new ChartisanHooks()
        .legend({ bottom: 0 })
        .tooltip()
        .title({
            textAlign: 'center',
            left: '50%',
            text: 'Tags',
        })
        .colors(['#4AA4E0'])
    });
</script>