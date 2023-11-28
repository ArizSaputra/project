function toggleNavbar() {
    var navbar = document.getElementById("Navbar");
    navbar.classList.toggle("hidden");
}

function showNavbar() {
    var navbar = document.getElementById("myNavbar");
    navbar.classList.add("active");
}

function hideNavbar() {
    var navbar = document.getElementById("myNavbar");
    navbar.classList.remove("active");
}
let typedText = "KreMas";
let typingIdx = 0;
let isBackspacing = false;
let pauseAfterTyping = 1000; // 1 detik

function type() {
  if (typingIdx < typedText.length && !isBackspacing) {
    document.getElementById("typed").textContent += typedText[typingIdx];
    typingIdx++;
    setTimeout(type, 150);
  } else if (typingIdx == typedText.length && !isBackspacing) {
    setTimeout(() => {
      isBackspacing = true;
      type();
    }, pauseAfterTyping);
  } else if (isBackspacing && typingIdx > 0) {
    document.getElementById("typed").textContent = typedText.substring(0, typingIdx - 1);
    typingIdx--;
    setTimeout(type, 200);
  } else {
    isBackspacing = false;
    setTimeout(type, 150);
  }
}

type();
