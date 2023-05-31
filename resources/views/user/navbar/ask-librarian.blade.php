<x-app-layout>
    <!-- Container for demo purpose -->
<div class="container mx-72 my-20">

  <!-- Section: Design Block -->
  <section class="mb-32 text-gray-800">
    <div class="grid lg:grid-cols-2 gap-4 lg:gap-x-12 lg:mb-0">
      <div class="mb-12 lg:mb-0">
        <h2 class="text-3xl font-bold mb-6">Ask a Librarian</h2>

        <p class="text-gray-500 mb-12">
          The campus library aim is to share information and resources that might help learners and researchers to their academic needs.
        </p>

        <form>
          <div class="form-group mb-6">
            <input type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-green-300 rounded transition ease-in-out m-0 focus:text-green-700 focus:bg-green focus:border-green-600 focus:outline-none"
              id="exampleInput7" placeholder="Name" />
          </div>
          <div class="form-group mb-6">
            <input type="email"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-green-300 rounded transition ease-in-out m-0 focus:text-green-700 focus:bg-white focus:border-green-600 focus:outline-none"
              id="exampleInput8" placeholder="cvsubacoor@gmail.com" />
          </div>
          <div class="form-group mb-6">
            <textarea
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-green-300 rounded transition ease-in-out m-0 focus:text-green-700 focus:bg-white focus:border-green-600 focus:outline-none"
              id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
          </div>
          <div class="form-group form-check text-center mb-6">
            <input type="checkbox"
              class="form-check-input appearance-none h-4 w-4 border border-green-300 rounded-sm bg-white checked:bg-green-600 checked:border-green-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
              id="exampleCheck87" checked />
            <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me a copy of this
              message</label>
          </div>
          <button type="submit"
            class="w-full px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
            Send
          </button>
        </form>
      </div>

      {{-- <div class="mb-6 md:mb-0">
        <p class="font-bold mb-4">Anim pariatur cliche reprehenderit?</p>
        <p class="text-gray-500 mb-12">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt autem numquam dolore
          molestias aperiam culpa alias veritatis architecto eos, molestiae vitae ex eligendi
          libero eveniet dolorem, doloremque rem aliquid perferendis.
        </p>

        <p class="font-bold mb-4">Non cupidatat skateboard dolor brunch?</p>
        <p class="text-gray-500 mb-12">
          Distinctio corporis, iure facere ducimus quos consectetur ipsa ut magnam autem
          doloremque ex! Id, sequi. Voluptatum magnam sed fugit iusto minus et suscipit? Minima
          sunt at nulla tenetur, numquam unde quod modi magnam ab deserunt ipsam sint aliquid
          dolores libero repellendus cupiditate mollitia quidem dolorem odit
        </p>

        <p class="font-bold mb-4">
          Praesentium voluptatibus temporibus consequatur non aspernatur?
        </p>
        <p class="text-gray-500 mb-12">
          Minima sunt at nulla tenetur, numquam unde quod modi magnam ab deserunt ipsam sint
          aliquid dolores libero repellendus cupiditate mollitia quidem dolorem.
        </p>

        <p class="font-bold mb-4">Voluptatum magnam sed fugit iusto minus et suscipit?</p>
        <p class="text-gray-500 mb-12">
          Laudantium perferendis, est alias iure ut veniam suscipit dolorem fugit. Et ipsam
          corporis earum ea ut quae cum non iusto blanditiis ipsum dolor eius reiciendis, velit
          adipisci quas.
        </p>
      </div> --}}
    </div>
  </section>
  <!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
</x-app-layout>
