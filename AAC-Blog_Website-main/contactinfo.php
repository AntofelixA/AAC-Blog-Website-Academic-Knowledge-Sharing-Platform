<script>
    function animateCounter(id, target, speed = 50) {
      const el = document.getElementById(id);
      let count = 0;
      const step = () => {
        count++;
        el.textContent = count;
        if (count < target) {
          setTimeout(step, speed);
        } else {
          el.textContent = target;
        }
      };
      step();
    }

    // Start counting on page load
    window.onload = () => {
      animateCounter("studentCount", 250, 10);
      animateCounter("staffCount", 12, 100);
    };
  </script>