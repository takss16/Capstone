<x-layout-portal>
    <main class="mw-100 col-11">
        <div class="container">
            <h1 class="text-left">Welcome, {{ $patient->firstname }} {{ $patient->lastname }}</h1>

            <div class="d-flex justify-content-center mt-3">
                <div class="col-10 ">
                    <div class="card shadow-lg ">
                        @if ($latestCheckUp)
                        <div class="mt-3 mb-3 ms-3">
                            <h5 class="card-title">Last Checkup on {{ \Carbon\Carbon::parse($latestCheckUp->visit_date)->format('F d, Y') }}</h5>
                        </div>
                        @if ($latestCheckUp->aog >= 20)
                        <h4 class="text-center"><b>Your pregnancy is in the second trimester.</b></h4>
                        @elseif ($latestCheckUp->aog >= 30)
                        <h4 class="text-center"><b>Your pregnancy is in the third trimester.</b></h4>
                        @else
                        <h4 class="text-center"><b>Your pregnancy is in the first trimester.</b></h4>
                        @endif


                        <div class="col-xl- mt-3 col-md-8 mx-auto" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box text-center">
                                @if (strpos($latestCheckUp->aog, '1 week') !== false)
                                <img src="{{ asset('img/child/week1.jpg') }}" alt="Week 1 Image" class="img-fluid">
                                <p><strong>Week 1</strong></p>
                                <p>
                                    At the start of this week, you ovulate. Your egg is fertilized 12 to 24 hours later if a sperm
                                    penetrates it. Over the next several days, the fertilized egg will start dividing into multiple cells
                                    as it travels down the fallopian tube, enters your uterus, and starts to burrow into the uterine lining.
                                </p>
                                @elseif (strpos($latestCheckUp->aog, '2 weeks') !== false)
                                <img src="{{ asset('img/child/week2.jpg') }}" alt="Week 2 Image" class="img-fluid">
                                <p><strong>Week 2</strong>
                                <p>Now nestled in the nutrient-rich lining of your uterus is a microscopic ball of hundreds of rapidly multiplying
                                    cells that will develop into your baby. This ball of cells, called a blastocyst, has begun to produce the pregnancy
                                    hormone hCG, which tells your ovaries to stop releasing eggs.</p>
                                @elseif (strpos($latestCheckUp->aog, '3 weeks') !== false)
                                <img src="{{ asset('img/child/week3.jpg') }}" alt="Week 3 Image" class="img-fluid">
                                <p><strong>Week 3</strong>
                                <p>Your ball of cells is now officially an embryo. You're now about 4 weeks from the beginning of your last period.
                                    It's around this time – when your next period would normally be due – that you might be able to get a positive result
                                    on a home pregnancy test.</p>
                                @elseif (strpos($latestCheckUp->aog, '4 weeks') !== false)
                                <img src="{{ asset('img/child/week4.jpg') }}" alt="Week 4 Image" class="img-fluid">
                                <p><strong>Week 4</strong>
                                <p>Your baby resembles a tadpole more than a human, but is growing fast. The circulatory system is beginning to form,
                                    and cells in the tiny "heart" will start to flicker this week. Your baby is the size of a sesame seed.</p>
                                @elseif (strpos($latestCheckUp->aog, '5 weeks') !== false)
                                <img src="{{ asset('img/child/week5.jpg') }}" alt="Week 5 Image" class="img-fluid">
                                <p><strong>Week 5</strong>
                                <p>Your baby's nose, mouth and ears are starting to take shape, and their intestines and brain are beginning to develop.
                                    Your baby is the size of a lentil.</p>
                                @elseif (strpos($latestCheckUp->aog, '6 weeks') !== false)
                                <img src="{{ asset('img/child/week6.jpg') }}" alt="Week 6 Image" class="img-fluid">
                                <p><strong>Week 6</strong>
                                <p>Your baby has doubled in size since last week, but still has a tail, which will soon disappear. Little hands and feet that look
                                    more like paddles are emerging from the developing arms and legs.</p>
                                @elseif (strpos($latestCheckUp->aog, '7 weeks') !== false)
                                <img src="{{ asset('img/child/week7.jpg') }}" alt="Week 7 Image" class="img-fluid">
                                <p><strong>Week 7</strong>
                                <p>Your baby has started moving around, though you won't feel your baby move yet. Nerve cells are branching out, forming primitive neural pathways.
                                    Breathing tubes now extend from their throat to their developing lungs. Your baby is the size of a kidney bean.</p>
                                @elseif (strpos($latestCheckUp->aog, '8 weeks') !== false)
                                <img src="{{ asset('img/child/week8.jpg') }}" alt="Week 8 Image" class="img-fluid">
                                <p><strong>Week 8</strong>
                                <p>Your baby's basic anatomy is developing (they even have tiny earlobes now), but there's much more to come. Their embryonic tail has disappeared
                                    and they weigh just a fraction of an ounce but are about to start gaining weight fast. Your baby is the size of a grape.</p>
                                @elseif (strpos($latestCheckUp->aog, '9 weeks') !== false)
                                <img src="{{ asset('img/child/week9.jpg') }}" alt="Week 9 Image" class="img-fluid">
                                <p><strong>Week 9</strong>
                                <p>Your embryo has completed the most critical portion of development. Their skin is still translucent, but their tiny limbs can bend and fine details
                                    like nails are starting to form. Your baby is the size of a kumquat</p>
                                @elseif (strpos($latestCheckUp->aog, '10 weeks') !== false)
                                <img src="{{ asset('img/child/week10.jpg') }}" alt="Week 10 Image" class="img-fluid">
                                <p><strong>Week 10</strong>
                                <p>Your baby is almost fully formed. They're kicking, stretching, and even hiccupping as their diaphragm develops, although you can't feel any activity yet.
                                    Your baby is the size of a fig.</p>
                                @elseif (strpos($latestCheckUp->aog, '11 weeks') !== false)
                                <img src="{{ asset('img/child/week11.jpg') }}" alt="Week 11 Image" class="img-fluid">
                                <p><strong>Week 11</strong>
                                <p>This week your baby's reflexes kick in: Their fingers will soon begin to open and close, toes will curl, and their mouth will make sucking movements. Your baby is the size of a lime.</p>
                                @elseif (strpos($latestCheckUp->aog, '12 weeks') !== false)
                                <img src="{{ asset('img/child/week12.jpg') }}" alt="Week 12 Image" class="img-fluid">
                                <p><strong>Week 12</strong>
                                <p>This is the last week of your first trimester. Your baby's tiny fingers now have fingerprints, and their veins and organs are clearly visible through their skin. If you're having a girl, her ovaries contain more than 2 million eggs. Your baby is the size of a pea pod.</p>
                                @elseif (strpos($latestCheckUp->aog, '13 weeks') !== false)
                                <img src="{{ asset('img/child/week13.jpg') }}" alt="Week 13 Image" class="img-fluid">
                                <p><strong>Week 13</strong>
                                <p>Your baby's brain impulses have begun to fire and they're using their facial muscles. Their kidneys are working now, too. If you have an ultrasound, you may even see them sucking their thumb. Your baby is the size of a lemon.</p>
                                @elseif (strpos($latestCheckUp->aog, '14 weeks') !== false)
                                <img src="{{ asset('img/child/week14.jpg') }}" alt="Week 14 Image" class="img-fluid">
                                <p><strong>Week 14</strong>
                                <p>Your baby's eyelids are still fused shut, but they can sense light. If you shine a flashlight on your tummy, they'll move away from the beam. Ultrasounds done this week may reveal your baby's sex. Your baby is the size of an apple.</p>
                                @elseif (strpos($latestCheckUp->aog, '15 weeks') !== false)
                                <img src="{{ asset('img/child/week15.jpg') }}" alt="Week 15 Image" class="img-fluid">
                                <p><strong>Week 15</strong>
                                <p>The patterning on your baby's scalp has begun, though their hair isn't visible yet. Their legs are more developed, their head is more upright, and their ears are close to their final position. Your baby is the size of an avocado.</p>
                                @elseif (strpos($latestCheckUp->aog, '16 weeks') !== false)
                                <img src="{{ asset('img/child/week16.jpg') }}" alt="Week 16 Image" class="img-fluid">
                                <p><strong>Week 16</strong>
                                <p>Your baby can move their joints, and their skeleton – formerly soft cartilage – is now hardening to bone. The umbilical cord is growing stronger and thicker. Your baby is the size of a turnip.</p>
                                @elseif (strpos($latestCheckUp->aog, '17 weeks') !== false)
                                <img src="{{ asset('img/child/week17.jpg') }}" alt="Week 17 Image" class="img-fluid">
                                <p><strong>Week 17</strong>
                                <p>Your baby is flexing their arms and legs, and you may be able to feel those movements. Internally, a protective coating of myelin is forming around their nerves. Your baby is the size of a bell pepper.</p>
                                @elseif (strpos($latestCheckUp->aog, '18 weeks') !== false)
                                <img src="{{ asset('img/child/week18.jpg') }}" alt="Week 18 Image" class="img-fluid">
                                <p><strong>Week 18</strong>
                                <p>Your baby's senses – smell, vision, touch, taste and hearing – are developing and they may be able to hear your voice. Talk, sing or read out loud to them, if you feel like it. Your baby is the size of an heirloom tomato.</p>
                                @elseif (strpos($latestCheckUp->aog, '19 weeks') !== false)
                                <img src="{{ asset('img/child/week19.jpg') }}" alt="Week 19 Image" class="img-fluid">
                                <p><strong>Week 19</strong>
                                <p>Your baby can swallow now and their digestive system is producing meconium, the dark, sticky goo that they'll pass in their first poop – either in their diaper or in the womb during delivery. Your baby is the size of a banana.</p>
                                @elseif (strpos($latestCheckUp->aog, '20 weeks') !== false)
                                <img src="{{ asset('img/child/week20.jpg') }}" alt="Week 20 Image" class="img-fluid">
                                <p><strong>Week 20</strong>
                                <p>Your baby's movements have gone from flutters to full-on kicks and jabs against the walls of your womb. You may start to notice patterns as you become more familiar with their activity. Your baby is the size of a carrot.</p>
                                @elseif (strpos($latestCheckUp->aog, '21 weeks') !== false)
                                <img src="{{ asset('img/child/week21.jpg') }}" alt="Week 21 Image" class="img-fluid">
                                <p><strong>Week 21</strong>
                                <p>Your baby now looks almost like a miniature newborn. Features such as lips and eyebrows are more distinct, but the pigment that will color their eyes isn't present yet. Your baby is the size of a spaghetti squash.</p>
                                @elseif (strpos($latestCheckUp->aog, '22 weeks') !== false)
                                <img src="{{ asset('img/child/week22.jpg') }}" alt="Week 22 Image" class="img-fluid">
                                <p><strong>Week 22</strong>
                                <p>Your baby's ears are getting better at picking up sounds. After birth, they may recognize some noises outside the womb that they're hearing inside now. Your baby is the size of a large mango.</p>
                                @elseif (strpos($latestCheckUp->aog, '23 weeks') !== false)
                                <img src="{{ asset('img/child/week23.jpg') }}" alt="Week 23 Image" class="img-fluid">
                                <p><strong>Week 23</strong>
                                <p>Your baby cuts a pretty long and lean figure, but chubbier times are coming. Their skin is still thin and translucent, but that will begin to change soon too. Your baby is the size of an ear of corn.</p>
                                @elseif (strpos($latestCheckUp->aog, '24 weeks') !== false)
                                <img src="{{ asset('img/child/week24.jpg') }}" alt="Week 24 Image" class="img-fluid">
                                <p><strong>Week 24</strong>
                                <p>Your baby's wrinkled skin is starting to fill out with baby fat, making them look more like a newborn. Their hair is beginning to come in, and it has color and texture. Your baby is now the same weight as an average rutabaga.</p>
                                @elseif (strpos($latestCheckUp->aog, '25 weeks') !== false)
                                <img src="{{ asset('img/child/week25.jpg') }}" alt="Week 25 Image" class="img-fluid">
                                <p><strong>Week 25</strong>
                                <p>Your baby is now inhaling and exhaling amniotic fluid, which helps develop their lungs. These breathing movements are good practice for that first breath of air at birth.Your baby is the size of a bunch of scallions.</p>
                                @elseif (strpos($latestCheckUp->aog, '26 weeks') !== false)
                                <img src="{{ asset('img/child/week26.jpg') }}" alt="Week 26 Image" class="img-fluid">
                                <p><strong>Week 26</strong>
                                <p>This is the last week of your second trimester. Your baby now sleeps and wakes on a regular schedule, and their brain is very active. Their lungs aren't fully formed, but they could function outside the womb with medical help.Your baby is the size of a head of cauliflower.</p>

                                @elseif (strpos($latestCheckUp->aog, '27 weeks') !== false)
                                <img src="{{ asset('img/child/week27.jpg') }}" alt="Week 27 Image" class="img-fluid">
                                <p><strong>Week 27</strong>
                                <p>Your baby's eyesight is developing, which may enable them to sense light filtering in from the outside. They can blink, and their eyelashes have grown in. Your baby is the size of a large eggplant.</p>
                                @elseif (strpos($latestCheckUp->aog, '28 weeks') !== false)
                                <img src="{{ asset('img/child/week28.jpg') }}" alt="Week 28 Image" class="img-fluid">
                                <p><strong>Week 28</strong>
                                <p>Your baby's muscles and lungs are busy getting ready to function in the outside world, and their head is growing to make room for their developing brain. Your baby is the size of a butternut squash.</p>
                                @elseif (strpos($latestCheckUp->aog, '29 weeks') !== false)
                                <img src="{{ asset('img/child/week29.jpg') }}" alt="Week 29 Image" class="img-fluid">
                                <p><strong>Week 29</strong>
                                <p>Your baby is surrounded by a pint and a half of amniotic fluid, although there will be less of it as they grow and claim more space inside your uterus. Your baby is the size of a large cabbage.</p>
                                @elseif (strpos($latestCheckUp->aog, '30 weeks') !== false)
                                <img src="{{ asset('img/child/week30.jpg') }}" alt="Week 30 Image" class="img-fluid">
                                <p><strong>Week 30</strong>
                                <p>Your baby can now turn their head from side to side. A protective layer of fat is accumulating under their skin, filling out their arms and legs. Your baby is the size of a coconut.</p>
                                @elseif (strpos($latestCheckUp->aog, '31 weeks') !== false)
                                <img src="{{ asset('img/child/week31.jpg') }}" alt="Week 31 Image" class="img-fluid">
                                <p><strong>Week 31</strong>
                                <p>You're probably gaining about a pound a week now. Half of that goes straight to your baby, who will gain one-third to half their birth weight in the next seven weeks in preparation for life outside the womb. Your baby is the size of a large jicama.</p>
                                @elseif (strpos($latestCheckUp->aog, '32 weeks') !== false)
                                <img src="{{ asset('img/child/week32.jpg') }}" alt="Week 32 Image" class="img-fluid">
                                <p><strong>Week 32</strong>
                                <p>The bones in your baby's skull aren't fused yet. That allows them to shift as their head squeezes through the birth canal. They won't fully fuse until adulthood.Your baby is the size of a pineapple.</p>
                                @elseif (strpos($latestCheckUp->aog, '33 weeks') !== false)
                                <img src="{{ asset('img/child/week33.jpg') }}" alt="Week 33 Image" class="img-fluid">
                                <p><strong>Week 33</strong>
                                <p>Your baby's central nervous system is maturing, as are their lungs. Babies born between 34 and 37 weeks who have no other health problems usually do well in the long run. Your baby is the size of a cantaloupe.</p>
                                @elseif (strpos($latestCheckUp->aog, '34 weeks') !== false)
                                <img src="{{ asset('img/child/week34.jpg') }}" alt="Week 34 Image" class="img-fluid">
                                <p><strong>Week 34</strong>
                                <p>It's getting snug inside your womb – but you should still feel your baby moving as much as ever. Your baby's kidneys are fully developed, and their liver can process some waste products. Your baby is the size of a honeydew melon.</p>
                                @elseif (strpos($latestCheckUp->aog, '35 weeks') !== false)
                                <img src="{{ asset('img/child/week35.jpg') }}" alt="Week 35 Image" class="img-fluid">
                                <p><strong>Week 35</strong>
                                <p>Your baby is gaining about an ounce a day. They're also losing most of their lanugo hair that covered their body, along with the vernix caseosa, a waxy substance that was protecting their skin until now. Your baby is the size of a head of romaine lettuce.</p>
                                @elseif (strpos($latestCheckUp->aog, '36 weeks') !== false)
                                <img src="{{ asset('img/child/week36.jpg') }}" alt="Week 36 Image" class="img-fluid">
                                <p><strong>Week 36</strong>
                                <p>Your due date is very close, and though your baby looks like a newborn, they're not considered full-term until 39 weeks. Over the next two weeks, their lungs and brain will continue to mature. Your baby is the size of a bunch of Swiss chard.</p>
                                @elseif (strpos($latestCheckUp->aog, '37 weeks') !== false)
                                <img src="{{ asset('img/child/week37.jpg') }}" alt="Week 37 Image" class="img-fluid">
                                <p><strong>Week 37</strong>
                                <p>Are you curious about your baby's eye color? Their irises aren't fully pigmented at birth, so their eyes could change color up until they're about a year old. Your baby is the size of a leek.</p>
                                @elseif (strpos($latestCheckUp->aog, '38 weeks') !== false)
                                <img src="{{ asset('img/child/week38.jpg') }}" alt="Week 38 Image" class="img-fluid">
                                <p><strong>Week 38</strong>
                                <p>Your baby's physical development is complete, but they're still busy putting on fat and growing bigger. Your baby is the size of a mini watermelon.</p>
                                @elseif (strpos($latestCheckUp->aog, '39 weeks') !== false)
                                <img src="{{ asset('img/child/week39.jpg') }}" alt="Week 39 Image" class="img-fluid">
                                <p><strong>Week 39</strong>
                                <p>If you're past your due date, you may not be as late as you think, especially if you calculated it solely based on the day of your last period. Sometimes women ovulate later than expected. Your provider will continuously assess your pregnancy to make sure you can safely continue your pregnancy.Your baby is the size of a small pumpkin.</p>
                                @elseif (strpos($latestCheckUp->aog, '40 weeks') !== false)
                                <img src="{{ asset('img/child/week40.jpg') }}" alt="Week 40 Image" class="img-fluid">
                                <p><strong>Week 40</strong>
                                <p>Your baby is now considered late-term. Going more than two weeks past your due date can put you and your baby at risk for complications, so your provider will probably talk to you about inducing labor. They may perform a non-stress test (NST) to monitor your baby's fetal heart rate and your contractions to make sure your baby isn't in any distress.</p>
                                @else
                                <p><strong>No image available for this AOG.</p>
                                @endif

                            </div>
                        </div>
                        <div class="mt-3 text-center mb-3 ms-3">
                            <h5 class="card-title">Estimated Due Date is on {{ \Carbon\Carbon::parse($latestCheckUp->edc)->format('F d, Y') }}</h5>
                        </div>
                        @else
                        <h4 class="text-center">No check-up records found.</h4>
                        @endif

                        <div class="card-body">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-layout-portal>