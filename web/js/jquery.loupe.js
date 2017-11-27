/**
 * loupe - an image magnifier for jQuery
 * (C) 2010 jdbartlett, MIT license
 * http://github.com/jdbartlett/loupe
 */
/**
 * loupe - an image magnifier for jQuery
 * (C) 2010 jdbartlett, MIT license
 * http://github.com/jdbartlett/loupe
 */
(function ($) {
    $.fn.loupe = function (arg) {
        var options = $.extend({
            loupe: 'loupe',
            width: 300,
            height: 250
        }, arg || {});

        return this.length ? this.each(function () {
            var $this = $(this), $big, $loupe,
                $small = $this.is('img') ? $this : $this.find('img:first'),
                move, hide = function () { $loupe.hide(); },
                time;

            if ($this.data('loupe') != null) {
                return $this.data('loupe', arg);
            }

            move = function (e) {
                var os = $small.offset(),
                    sW = $small.outerWidth(),
                    sH = $small.outerHeight(),
                    oW = options.width / 2,
                    oH = options.height / 2;

                if (!$this.data('loupe') ||
                    e.pageX > sW + os.left + 1 || e.pageX < os.left - 1 ||
                    e.pageY > sH + os.top + 1 || e.pageY < os.top - 1   ) {
                    return hide();
                }

                time = time ? clearTimeout(time) : 0;

                $loupe.show().css({
                    left: e.pageX - oW,
                    top: e.pageY - oH
                });
                $big.css({
                    left: -(((e.pageX - os.left) / sW) * $big.width() - oW)|0,
                    top: -(((e.pageY - os.top) / sH) * $big.height() - oH)|0
                });
            };

            $loupe = $('<div />')
                .addClass(options.loupe)
                .css({
                    width: options.width,
                    height: options.height,
                    position: 'absolute',
                    overflow: 'hidden'
                })
                .append($big = $('<img />').attr('src', $this.attr($this.is('img') ? 'src' : 'href')).css('position', 'absolute').css('width', '500px'))
                .mousemove(move)
                .hide()
                .appendTo('body');

            $this.data('loupe', true)
                .mouseenter(move)
                .mouseout(function () {
                    time = setTimeout(hide, 10);
                });
        }) : this;
    };
}(jQuery));




// $('.demo').loupe();
$('.demo').loupe({
    width: 240, // ширина лупы
    height: 150, // высота лупы
    loupe: 'loupe' // установить css класс лупы - для курсора и тд
});
