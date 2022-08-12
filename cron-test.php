	//cron job constructor calls
			add_action( 'init',array( $this, 'json_refresh_cron'));
			add_filter( 'cron_schedules', array( $this,'gun_uni_add_schedule'));
			add_action( 'gun_task_hook', array( $this, 'wpdocs_task_function'));
  
  
  
  
  public function gun_uni_add_schedule(){
 			$schedules['my_cron_worker_two'] = array( 'interval' => 120, 'display' => 'My Cron Worker 2' );
 			return $schedules;
 		}
	public function json_refresh_cron(){
			if ( ! wp_next_scheduled( 'gun_task_hook' ) ) {
		    	wp_schedule_event( time(), 'my_cron_worker_two', 'gun_task_hook' );
				}
		}

	 public function wpdocs_task_function() {
		  wp_mail( 'thavisha@surge.global', 'Automatic email', 'Automatic scheduled email from WordPress.');
		}
