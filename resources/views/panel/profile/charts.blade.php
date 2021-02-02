



<script type="text/javascript">
    var dom = document.getElementById("container");
    var myChart = echarts.init(dom);
    var users = '<?php echo ( isset($user_table) ? count($user_table) : '' ) ?>';
    var blogs = '<?php echo ( isset($blog_table) ? count($blog_table) : '' ) ?>';
    var images = '<?php echo ( isset($image_table) ? count($image_table) : '' ) ?>';
    var contacts = '<?php echo ( isset($contact_table) ? count($contact_table) : '' ) ?>';
    var partner = '<?php echo ( isset($partner_table) ? count($partner_table) : '' ) ?>';
    var app = {};
    option = null;
    option = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)'
        },
        legend: {
            orient: 'vertical',
            left: 10,
            data: [
                'Gallery',
                'User',
                'Contact' ,
                'Blog' ,
                'Partner'
            ]
        },
        series: [
            {
                name: 'charts',
                type: 'pie',
                radius: ['50%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [
                    {value: images, name: 'Gallery'},
                    {value: users, name: 'User'},
                    {value: contacts, name: 'Contact'},
                    {value: blogs, name: 'Blog'},
                    {value: partner, name: 'Partner'},
                ]
            }
        ]
    };
    ;
    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
</script>
