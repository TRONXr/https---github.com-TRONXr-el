<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Сайт психолога Вильдана Хузина</title>
 
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  </head>
  <body>
    <header class="bg-dark fixed-top">
      <nav class="container-xxl navbar navbar-expand-lg py-3 bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold fs-3" href="#">ВИЛЬДАН ХУЗИН</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item mx-2">
                <a class="nav-link" href="#skills">ПРАКТИКА</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="#portfolio">ДОСТИЖЕНИЯ</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="#about">ОБО МНЕ</a>
              </li>
              
              <li class="nav-item mx-2">
                <a class="nav-link" href="#contact">ЗАПИСАТЬСЯ</a>
              </li>

              <li class="nav-item mx-2">
                <a class="nav-link" href="{{ route('tests.index') }}">ТЕСТЫ</a>
              </li>
          </div>
        </div>
      </nav>
    </header>

  
    <section class="hero d-flex flex-column align-items-center justify-content-center">
      <div class="text-center">
        <h1 class="h1 text-white fw-medium fst-italic">ВИЛЬДАН ХУЗИН</h1>
        <h2 class="display-3 text-white fw-bold">ПСИХОЛОГ & СЕКСОЛОГ <br /> </h2>
        <a href="#contact" class="btn btn-lg fs-6 fw-medium mt-5 btn-primary p-3">Записаться</a>
      </div>
    </section>
    
    
    <section class="container py-5" id="skills">
      <div class="row mt-4 py-3">
        <div class="col-12 d-flex flex-column text-center justify-content-center">
          <h2>ПРАКТИКА</h2>
          <h5 class="text-secondary fw-normal py-2 fst-italic">Постоянно совершенствую свои навыки и знания в области психологии</h5>
        </div>
      </div>
      <div class="row d-flex justify-content-between mx-0">
        <div class="card mt-5 d-flex flex-column align-items-center text-center bg-white p-4" style="width: 25rem">
        <i class="text-white bg-primary d-flex align-items-center justify-content-center fs-2 rounded-circle fa-solid fa-user"></i>
          <h3 class="mt-4 h4">Индивидуальное консультирование</h3>
          <p class="text-center">Оказываю помощь в решении личных проблем, работе с тревожностью, стрессом и эмоциональными трудностями</p>
        </div>
        <div class="card mt-5 d-flex flex-column align-items-center text-center bg-white p-4" style="width: 25rem">
        <i class="text-white bg-primary d-flex align-items-center justify-content-center fs-2 rounded-circle fa-solid fa-users"></i>
          <h3 class="mt-4 h4">Семейная терапия</h3>
          <p class="text-center">Помогаю парам и семьям улучшить общение, наладить взаимоотношения и решить конфликты</p>
        </div>
        <div class="card mt-5 d-flex flex-column align-items-center text-center bg-white p-4" style="width: 25rem">
        <i class="text-white bg-primary d-flex align-items-center justify-content-center fs-2 rounded-circle fa-solid fa-heart"></i>
          <h3 class="mt-4 h4">Сексологическое консультирование</h3>
          <p class="text-center">Предоставляю помощь в решении вопросов, связанных с сексуальной сферой, и поддерживаю в построении гармоничных отношений</p>
        </div>
      </div>
    </section>

   <section class="container py-5" id="portfolio">
    <div class="row mt-4 py-3">
        <div class="col-12 d-flex flex-column text-center justify-content-center">
            <h2>ИССЛЕДОВАНИЯ И ТЕРАПЕВТИЧЕСКИЕ ПОДХОДЫ</h2>
            
        </div>
        <div class="row mt-5 mx-0 justify-content-center align-items-center">
            <!-- Первое фиксированное достижение -->
            <div class="col-lg-3 col-md-4 card-wrapper">
                <div class="card mt-4">
                    <img src="images/smek.jpg" class="img-fluid" alt="portfolio-img">
                    <div class="card-body text-center">
                        <h5 class="card-title">Тесты по Психологии</h5>
                        <p><a href="{{ route('tests.index') }}">Проверьте себя</a></p>
                    </div>
                </div>
            </div>
            
            <!-- Динамические достижения из базы данных -->
            @foreach($achievements as $achievement)
            <div class="col-lg-3 col-md-4 card-wrapper">
                <div class="card mt-4">
                    <img src="{{ asset('storage/' . $achievement->image) }}" class="img-fluid" alt="{{ $achievement->title }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $achievement->title }}</h5>
                        <p>{{ $achievement->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>      
</section>
    <!-- <section class="container py-5" id="portfolio">
      <div class="row mt-4 py-3">
        <div class="col-12 d-flex flex-column text-center justify-content-center">
          <h2>ДОСТИЖЕНИЯ</h2>
          <h5 class="text-secondary fw-normal py-2 fst-italic">Мои достижения в сфере психлогии</h5>
        </div>
        <div class="row mt-5 mx-0 justify-content-center align-items-center">
          
          <div class="col-lg-3 col-md-4 card-wrapper">
            <div class="card mt-4">
              <img src="images/smek.jpg" class="img-fluid" alt="portfolio-img">
              <div class="card-body text-center">
                <h5 class="card-title">Тесты по Психологии</h5>
                <p> <a href="{{ route('tests.index') }}">Проверьте себя</a></p>
               
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-12 card-wrapper">
            <div class="card mt-4">
              <img src="images/psihologiya.jpg" class="img-fluid" alt="portfolio-img">
              <div class="card-body text-center">
                <h5 class="card-title">Психотерапевт </h5>
                <p> Целенаправленное воздействие на психику человека</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 card-wrapper">
            <div class="card mt-4">
              <img src="images/blog.png" class="img-fluid" alt="portfolio-img">
              <div class="card-body text-center">
                <h5 class="card-title">Личный блог</h5>
               <p>Личный блог в котором я выкладываю свои идеи</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 card-wrapper">
            <div class="card mt-4">
              <img src="images/eco.jpeg" class="img-fluid" alt="portfolio-img">
              <div class="card-body text-center">
                <h5 class="card-title">Арт-терапия</h5>
                <p>Направление в психотерапии и психологической коррекции</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>      
    </section> -->

    <!-- About Section -->
    <section class="container py-5" id="about">
      <div class="row mt-4 py-3">
        <div class="col-12 d-flex flex-column text-center">
          <h2>ОБО МНЕ</h2>
          <h5 class="text-secondary fw-normal py-2 fst-italic">Узнайте больше обо мне</h5>
        </div>
      </div>
      <div class="row flex-row-reverse flex-md-row mt-5 pt-5">
        <div class="col-9 col-md-5 text-md-end">
          <h5>2010-2016</h5>
          <h5>Осознание интереса к психологии</h5>
          <p>С ранних лет я был увлечён внутренним миром человека и его поведением. Чтение книг по психологии и наблюдение за окружающими пробудили интерес к изучению человеческой природы и способам решения внутренних конфликтов</p>
        </div>
        <div class="col-3 col-md-2 img text-center">
          <img class="rounded-circle border border-5 border-dark-subtle img-fluid" src="images/about.jpg" alt="img">
        </div>
      </div>
      <div class="row justify-content-md-end mt-5 pt-5">
        <div class="col-3 col-md-2 img text-center">
          <img class="rounded-circle border border-5 border-dark-subtle img-fluid" src="images/about1.jpg" alt="img">
        </div>
        <div class="col-9 col-md-5">
          <h5>2016-2022</h5>
          <h5>Образование и первые шаги в профессии</h5>
          <p>В период обучения в университете я получил глубокие знания в области психологии, уделяя особое внимание практическому применению теории. Участвовал в стажировках и научных проектах, что позволило освоить навыки консультирования и работы с людьми в разных жизненных ситуациях</p>
        </div>
      </div>
      <div class="row flex-row-reverse flex-md-row mt-5 pt-5">
        <div class="col-9 col-md-5 text-md-end">
          <h5>2022-настоящее время</h5>
          <h5>Профессиональное развитие и помощь клиентам</h5>
          <p>За годы практики я помог многим клиентам преодолеть трудности, найти гармонию и уверенность в себе. Я регулярно прохожу курсы повышения квалификации, чтобы применять современные методы терапии, и стремлюсь создать безопасное пространство для каждого клиента, обеспечивая поддержку и понимание</p>
        </div>
        <div class="col-3 col-md-2 img text-center">
          <img class="rounded-circle border border-5 border-dark-subtle img-fluid" src="images/about.jpg" alt="img">
        </div>
      </div>
      <div class="row justify-content-md-end mt-5 pt-5">
        <div class="col-3 col-md-2 img text-center">
          <img class="rounded-circle border border-5 border-dark-subtle img-fluid" src="images/about1.jpg" alt="img">
        </div>
        <div class="col-9 col-md-5">
          <h5>Будущее</h5>
          <h5>Продолжая помогать людям</h5>
          <p>Я стремлюсь использовать свои знания и опыт для оказания качественной помощи людям в преодолении жизненных трудностей. Моя цель – создавать пространство, где каждый может почувствовать себя услышанным, найти ресурсы для личностного роста и достичь гармонии. Я готов к новым вызовам и открыт для сотрудничества, чтобы сделать мир немного лучше</p>
        </div>
      </div>
         
    </section>

    

     <!-- Contact Section -->
     <section class="py-5" id="contact">
      <div class="container-xxl py-5">
        <div class="col-12 d-flex flex-column text-center justify-content-center">
          <h2 class="text-white">Запись на консультацию</h2>
          <h5 class="text-white fw-normal py-2 fst-italic">Нужна помощь или поддержка? Заполните форму, и я свяжусь с вами в течение 24-48 часов, чтобы обсудить, как я могу вам помочь</h5>
        </div>
        <div class="row pt-4 mt-5">
          <div class="col-12">
          <form id="messageForm" action="{{ route('applications.landing') }}" method="POST">
    @csrf
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Ваше имя" required>
                <label for="floatingInput">Твое Имя</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Ваша почта" required>
                <label for="floatingEmail">Твоя почта</label>
            </div>
            <div class="form-floating mb-3">
            <input type="tel" name="phone" class="form-control" id="floatingPhone" 
           placeholder="+79958604567" pattern="\+7\d{10}" 
           title="Формат: +7XXXXXXXXXX (11 цифр)" required>
           <label for="floatingPhone">Твой телефон</label>
          </div>
        </div>
        <div class="form-floating col-lg-6">
            <textarea name="message" class="form-control" placeholder="Напишите вашу проблему" id="floatingMessage" style="height: 205px" required></textarea>
            <label for="floatingMessage" class="px-4">Твоя проблема</label>
        </div>
        <div id="successMessage" class="alert alert-dark text-center position-fixed top-0 start-50 translate-middle-x mt-3 d-none" style="z-index: 1050;">
            Вильдан получил заявку!
        </div>
        <div class="col-12 mt-5 d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-outline-light">Отправить</button>
        </div>
    </div>
</form>
          </div>
        </div>
       </div>
     </section>

     <!-- Footer -->
     <footer>
      <div class="container-xxl flex-wrap pt-3 d-flex align-items-center justify-content-between">
        <p> Пермь/Москва +79945678945</p>
        <p></p>
        <ul class="social-icons d-flex">
          <a href="#" class="bg-primary mx-2 text-white d-flex align-items-center justify-content-center text-decoration-none rounded-circle"><small><i class="fa-brands fa-telegram"></i></small></a>
          <a href="#" class="bg-primary mx-2 text-white d-flex align-items-center justify-content-center text-decoration-none rounded-circle"><small><i class="fa-brands fa-vk"></i></small></a>
    
        </ul>
      </div>
     </footer>
    
     <!-- Bootstrap script link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    $('#messageForm').on('submit', function (e) {
        e.preventDefault(); // Останавливаем стандартное поведение формы

        $.ajax({
            url: '{{ route("applications.landing") }}', // Указываем маршрут
            method: 'POST',
            data: $(this).serialize(), // Собираем данные формы
            success: function (response) {
                // Показываем сообщение об успехе
                $('#successMessage').removeClass('d-none').fadeIn();

                // Скрываем сообщение через 3 секунды
                setTimeout(function () {
                    $('#successMessage').fadeOut();
                }, 3000);

                // Очищаем форму
                $('#messageForm')[0].reset();
            },
            error: function (xhr) {
                alert('Произошла ошибка! Попробуйте снова.');
            }
        });
    });
});
</script>
  </body>
</html>

