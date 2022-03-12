<nav aria-label="Pagination for Perms">
      <ul class="pagination justify-content-center">
          <li class="page-item">
          <{!!$paginator->onFirstPage()
              ? 'span'
              : 'a href="' . $paginator->previousPageUrl() . '"'
              !!}
              class="{{$paginator->onFirstPage() ? 'text-gray-500 page-link' : 'text-gray-700 page-link'}}"
            >
               <span aria-hidden="true">&laquo;</span> Previous
            </{{$paginator->onFirstPage() ? 'span' : 'a' }}>
          </li>
          <li class="page-item">
            <{!!$paginator->hasMorePages()
                  ? 'a href="' . $paginator->nextPageUrl() . '"'
                  : 'a'
                !!}
                class="{{$paginator->hasMorePages() ? 'text-gray-700 page-link' : 'text-gray-500 page-link'}}"
              >
                <span aria-hidden="true">&raquo;</span> Next

          </{{ $paginator->hasMorePages() ? 'a' : 'a' }}>
          </li>
      </ul>
</nav>