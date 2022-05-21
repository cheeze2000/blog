class Post < ApplicationRecord
  paginates_per 9

  def read_time
    content.nil? ? 0 : (content.length / 500.0).ceil
  end
end
