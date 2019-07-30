<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }
class Pagination1 {
    //put your code here
    function __construct() {
         $this->ci =& get_instance();
    }
function create_links()
{
  // EDIT: ADDED THIS BECAUSE COULDN'T SEEM TO SET THIS ANYWHERE ELSE
  if ($this->anchor_class != '')
  {
     $this->anchor_class = 'class="'.$this->anchor_class.'" ';
  }

  // If our item count or per-page total is zero there is no need to continue.
  if ($this->total_rows == 0 OR $this->per_page == 0)
  {
     return '';
  }

  // Calculate the total number of pages
  $num_pages = ceil($this->total_rows / $this->per_page);

  // Is there only one page? Hm... nothing more to do here then.
  if ($num_pages == 1)
  {
     return '';
  }

  // Determine the current page number.
  $CI =& get_instance();

  if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
  {
     if ($CI->input->get($this->query_string_segment) != 0)
     {
        $this->cur_page = $CI->input->get($this->query_string_segment);

        // Prep the current page - no funny business!
        $this->cur_page = (int) $this->cur_page;
     }
  }
  else
  {
     if ($CI->uri->segment($this->uri_segment) != 0)
     {
        $this->cur_page = $CI->uri->segment($this->uri_segment);

        // Prep the current page - no funny business!
        $this->cur_page = (int) $this->cur_page;
     }
  }

  $this->num_links = (int)$this->num_links;

  if ($this->num_links < 1)
  {
     show_error('Your number of links must be a positive number.');
  }

  if ( ! is_numeric($this->cur_page))
  {
     $this->cur_page = 1;
  }

  // Is the page number beyond the result range?
  // If so we show the last page
  if ($this->cur_page > $this->total_rows)
  {
     $this->cur_page = ($num_pages - 1);
  }

  // EDIT: DON'T NEED THIS THE WAY I'VE CHANGED IT
  // $uri_page_number = $this->cur_page;
  // $this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

  // EDIT: START OF MODIFIED START AND END TO WORK HOW I WANT
  $totalLinks = ($this->num_links*2)+1;
  if($totalLinks > ($this->total_rows/$this->per_page))
  {
     $totalLinks = ceil($this->total_rows/$this->per_page);
  }
  //first page
  if($this->cur_page == 1)
  {
     $start = 1;
     $end = $start + $totalLinks - 1;
  }
  //middle pages
  elseif($this->cur_page + $this->num_links <= $num_pages && $this->cur_page - $this->num_links > 0)
  {
     $start = $this->cur_page - $this->num_links;
     $end = $this->cur_page + $this->num_links;
  }
  //last couple of pages
  elseif(($this->cur_page + $totalLinks) > $num_pages)
  {
     $start = $num_pages - $totalLinks + 1;
     $end = $num_pages;
     //check to see if this is in the first half of links so it doesn't jump the paging
     if($this->cur_page <= $this->num_links)
     {
        $start = 1;
        $end = $start + $totalLinks - 1;
     }
  }
  //first couple of pages
  elseif(($this->cur_page - $totalLinks) < 1)
  {
     $start = 1;
     $end = $start + $totalLinks - 1;
  }
  // EDIT: END OF MODIFIED START AND END TO WORK HOW I WANT

  // EDIT: CODEIGNITERS BASE PAGING SETUP SEE ABOVE FOR MY CHANGES
  // $start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
  // $end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

  // Is pagination being used over GET or POST?  If get, add a per_page query
  // string. If post, add a trailing slash to the base URL if needed
  if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
  {
     $this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
  }
  else
  {
     $this->base_url = rtrim($this->base_url, '/') .'/';
  }

  // And here we go...
  $output = '';

  // Render the "First" link
  // EDIT: CHANGED TO ALWAYS SHOW FIRST LINK AT LEAST
  if  ($this->first_link !== FALSE AND $this->cur_page != 1)
  {
     $first_url = ($this->first_url == '') ? $this->base_url."1" : $this->first_url;
     $output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
  }
  else
  {
     $output .= $this->cur_tag_open.$this->first_link.$this->cur_tag_close;
  }

  // Render the "previous" link
  // EDIT: CHANGED TO ALWAYS SHOW PREVIOUS LINK AT LEAST
  if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
  {
     $i = $this->cur_page-1;

     if ($i == 0 && $this->first_url != '')
     {
        $output .= $this->prev_tag_open.'<a  '.$this->anchor_class.'href="'.$this->first_url.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
     }
     else
     {
        $i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
        $output .= $this->prev_tag_open.'<a  '.$this->anchor_class.'href="'.$this->base_url.$i.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
     }

  }
  else
  {
     $output .= $this->cur_tag_open.$this->prev_link.$this->cur_tag_close;
  }

  // EDIT: CHANGED THIS TO ALWAYS SHOW ALL LINKS WANTED EVEN IF ON FIRST PAGE
  // Render the pages
  if ($this->display_pages !== FALSE)
  {
     // Write the digit links
     for ($loop = $start; $loop <= $end; $loop++)
     {
        // EDIT: DON'T NEED THIS THE WAY I'VE CHANGED IT
        // $i = ($loop * $this->per_page) - $this->per_page;

        if ($loop >= 0)
        {
           if ($this->cur_page == $loop)
           {
              $output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
           }
           else
           {
              $n = ($loop == 0) ? '0' : $loop;

              if ($n == '' && $this->first_url != '')
              {
                 $output .= $this->num_tag_open.'<a  '.$this->anchor_class.'href="'.$this->first_url.'">'.$loop.'</a>'.$this->num_tag_close;
              }
              else
              {
                 $n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;

                 $output .= $this->num_tag_open.'<a  '.$this->anchor_class.'href="'.$this->base_url.$n.'">'.$loop.'</a>'.$this->num_tag_close;
              }
           }
        }
     }
  }

  // Render the "next" link
  // EDIT: CHANGED TO ALWAYS SHOW NEXT LINK AT LEAST
  if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
  {
     $output .= $this->next_tag_open.'<a  '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.($this->cur_page+1).$this->suffix.'">'.$this->next_link.'</a>'.$this->next_tag_close;
  }
  else
  {
     $output .= $this->cur_tag_open.$this->next_link.$this->cur_tag_close;
  }

  // Render the "Last" link
  // EDIT: CHANGED TO ALWAYS SHOW LAST LINK AT LEAST
  if ($this->last_link !== FALSE AND $this->cur_page != $num_pages)
  {
     $i = (($num_pages));
     $output .= $this->last_tag_open.'<a  '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->last_link.'</a>'.$this->last_tag_close;
  }
  else
  {
     $output .= $this->cur_tag_open.$this->last_link.$this->cur_tag_close;
  }

  // Kill double slashes.  Note: Sometimes we can end up with a double slash
  // in the penultimate link so we'll kill all double slashes.
  $output = preg_replace("#([^:])//+#", "\\1/", $output);

  // Add the wrapper HTML if exists
  $output = $this->full_tag_open.$output.$this->full_tag_close;

  return $output;
}
}