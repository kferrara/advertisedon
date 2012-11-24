namespace AdvertisedOn.Models
{
    public class Industry
    {
        public int IndustryId { get; set; }
        public virtual Category Category { get; set; }
    }
}