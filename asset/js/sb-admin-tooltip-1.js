//=================================================
// for display tooltip
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================




var originalLeave = $.fn.tooltip.Constructor.prototype.leave;
$.fn.tooltip.Constructor.prototype.leave = function(obj) {
  var self = obj instanceof this.constructor ?
    obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
  var container, timeout;

  originalLeave.call(this, obj);

  if (obj.currentTarget) {
    container = $(obj.currentTarget).siblings('.tooltip')
    timeout = self.timeout;
    container.one('mouseenter', function() {
      //We entered the actual popover – call off the dogs
      clearTimeout(timeout);
      //Let's monitor popover content instead
      container.one('mouseleave', function() {
        $.fn.tooltip.Constructor.prototype.leave.call(self, self);
      });
    })
  }
};


$('body').tooltip({
  selector: '[data-toggle]',
  trigger: 'click hover',
  placement: 'auto',
  delay: {
    show: 50,
    hide: 400
  }
});


//select all
$(function() {
    $('#select-all').click(function() {
        $('input[name="nip-karyawan[]"]').prop('checked', this.checked);
    });
});

//select all2
$(function() {
    $('#select-all-bottom').click(function() {
        $('input[name="nip-karyawan[]"]').prop('checked', this.checked);
    });
});


//select all
$(function() {
    $('#pilih-semua').click(function() {
        $('input[name="id_gaji[]"]').prop('checked', this.checked);
    });
});

//select all2
$(function() {
    $('#pilih-semua-bottom').click(function() {
        $('input[name="id_gaji[]"]').prop('checked', this.checked);
    });
});




//satuan rupiah di view
var rupiahElements = document.getElementsByClassName('rupiah');

for (var i = 0; i < rupiahElements.length; i++) {
  var value = rupiahElements[i].textContent;

  if (value != '') {
    var formattedValue = 'Rp. ' + value;
    rupiahElements[i].textContent = formattedValue;
  } else {
    rupiahElements[i].textContent = '-';
  }
}